<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpellCheck extends Model {
    protected $_fh = '';
    protected $_indexLength = 0;
    protected $_indexSize = 0;
    protected $_index = '';
    protected $_indexCache = array();
    protected $_hitCache = array();

    /**
     * Build a search index from a plain text dictionary
     *
     * @param string $dictionary
     * @param string $outfile
     */
    public function buildIndex($dictionary, $outfile) {

        // Read the dictionary into memory
        $dict = file($dictionary);

        // Group all the words based on their metaphone
        // key.
        $dict2 = array();
        foreach ($dict as $word) {
            $m = metaphone($word);
            $dict2[$m][] = trim($word);
        }

        // Sort the dictionary based on the metaphone key so
        // that we can perform a binary search later on.
        ksort($dict2);

        // Build a binary dictionary
        $lbuf = ''; // Output buffer
        $pos = array(); // Entry positions used for the search index later on
        foreach ($dict2 as $m => $words) {

            // The format is:
            // 2 bytes string len + metaphone key + 0x01 + all the matching words separated by 0x01
            $buf = $m;
            $buf .= pack('c', 0x01);
            $buf .= implode(pack('c', 0x01), $words);

            // We prepend the length here. It's hard to know the length of
            // a string before it's been built. ;)
            $buf = pack('n', strlen($buf)) . $buf;

            // Store the position in the index
            $pos[] = strlen($lbuf);

            // Append the string to the output buffer
            $lbuf .= $buf;
        }

        // Initialize an index buffer.
        $index = '';
        // Since we prepend the index we need to increment all the index positions by the length
        // of the index:
        // 4byte index length + 4byte index size + 4byte * count($pos)
        // The length is the nr of index positions and the size is the bytecount for the index in this case
        $increment = 4 + 4 + 4 * count($pos);
        // Build the index
        foreach ($pos as $p) {
            $index .= pack('L', $increment + $p);
        }
        // Prepend the length and size to the index
        $index = pack('LL', count($pos), strlen($index)) . $index;

        // Prepend the index to the word buffer
        $lbuf = $index . $lbuf;

        // Store it to disk
        file_put_contents($outfile, $lbuf);
    }

    /**
     * Crate a new SpellChecker, open the data file
     *
     * @param string $dictisonary
     */
    public function __construct($dictionary) {

        $this->_fh = fopen($dictionary, 'r');
        list(,$this->_indexLength, $this->_indexSize) = unpack('L2', fread($this->_fh, 8));

    }

    /**
     * Decode a word segment
     *
     * @param string $in
     * @return array
     */
    protected function _decode($in) {
        $arr = explode(pack('c', 0x01), $in);
        return $arr;
    }

    /**
     * Retrieve a word segment
     *
     * @param integer $index
     * @return array
     */
    protected function _getIndex($index) {

        // Check for this position in the cache

        // Miss
        if (!array_key_exists($index, $this->_indexCache)) {

            // Retrieve the position from the index
            fseek($this->_fh, 8 + $index * 4);
            list(,$pos) = unpack('L', fread($this->_fh, 4));
            $this->_indexCache[$index] = $pos;

        }
        // Hit
        else {
            $pos = $this->_indexCache[$index];
        }

        // Check for the actual decoded segment

        // Miss
        if (!array_key_exists($pos, $this->_hitCache)) {

            // Move to the correct positon
            fseek($this->_fh, $pos);

            // Read the segment length
            list(,$len) = unpack("n", fread($this->_fh, 2));

            // Read and decode the segment
            $hit = $this->_decode(fread($this->_fh, $len));
            $this->_hitCache[$pos] = $hit;
        }
        // Hit
        else {
            $hit = $this->_hitCache[$pos];
        }

        return $hit;
    }

    /**
     * Perform a binary search for the metaphone key.
     * This function has worst case O(log N) performance,
     * where N is the number of metaphone keys.
     *
     * @param string $m
     * @param int $l
     * @param int $h
     * @return array
     */
    protected function _search($m, $l = 0, $h = false) {

        // The upper bound must be larger than the lower
        if ($h < $l) {
            return false;
        }

        // Set the upper bound if it isn't
        if ($h === false) {
            $h = $this->_indexLength - 1;
        }

        // Calculate the midpoint and retrieve the corresponding value
        $mid = (int)floor(($l + $h)/2);
        $hit = $this->_getIndex($mid);

        // Hit, return it
        if (strcmp($m, $hit[0]) === 0) {
            return $hit;
        }
        // Check the lower interval
        elseif (strcmp($m, $hit[0]) < 0) {
            return $this->_search($m, $l, $mid - 1);
        }
        // Check the upper interval
        else {
            return $this->_search($m, $mid + 1, $h);
        }
    }

    /**
     * Spell check a word and return a list of suggestions
     *
     * @param string $word
     * @return array
     */

    public function isWordCorrect($word) {
        // Calculate the metaphone key and perform a search
        $m = metaphone($word);
        $candidates = $this->_search($m);

        // Return false if the search fails
        if (!$candidates || !in_array($word,$candidates)) {
            return false;
        }
        else{
            return true;
        }

    }

    public function getSuggestions($word) {

        // Calculate the metaphone key and perform a search
        $m = metaphone($word);
        $candidates = $this->_search($m);

        //echo "i am here 1";
        // Return false if the search fails
        if (!$candidates) {
            return false;
        }
        //echo "i am here 2";

        // Calculate the score for each hit
        $suggestions = array();
        foreach ($candidates as $candidate) {
            $score = similar_text($candidate, $word);
            $min_score_allowed = strlen($candidate)-((41*strlen($candidate))/100);
            //echo "1(".$min_score_allowed . ")";
            //echo "2(".$candidate . ")";
            //echo "3(".$score . ")";
            //echo "4(".$score>=$min_score_allowed . ")-----";
            if($candidate==$word)
            {
                return $candidate;
            }
            if($score>=$min_score_allowed)
            {
                $suggestions[] = array('score' => $score, 'word' => $candidate);
            }
        }

        // Sort them with the most relevant hits first
        usort($suggestions, function ($a, $b) { return $a["score"] > $b["score"] ? -1 : 1; });

        return $suggestions;
    }

    /**
     * Spell check an entire sentence
     *
     * @param string $sentence
     * @return array
     */

    var $suggestion_made = false;

    public function checkSentence($sentence)
    {
        // Dismantle the sentence
        $words = explode(" ", $sentence);
        $new_words = "";
        // Retrieve the suggestions
        foreach ($words as &$word)
        {
            $suggestions = $this->getSuggestions($word);

            if (is_array($suggestions) && count($suggestions))
            {
                /*
                echo "1 : " . $sentence . "--".$suggestions[0]['word'];
                if(strpos( $sentence, $suggestions[0]['word']."" ) ===  false)
                {
                    echo "2";
                    $this->suggestion_made = true;
                    $new_words = $new_words." ".$suggestions[0]['word'];
                }
                else
                {
                    echo "3";
                    $new_words = $new_words." ".$word;
                }*/
                $this->suggestion_made = true;
                $new_words = $new_words." ".$suggestions[0]['word'];
            }
            else
            {
                $new_words = $new_words." ".$word;
            }
        }

        // Put it together again
        $sentencea = $sentence." ".implode(' ', $words);

        return $new_words;
    }

    public function checkWord($word)
    {
        return $this->isWordCorrect($word);
    }

}