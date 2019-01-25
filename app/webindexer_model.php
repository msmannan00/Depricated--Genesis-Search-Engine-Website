<?php

namespace App;
use DB;
use Session;
use keys;
use \Cache;

use Illuminate\Database\Eloquent\Model;
use Mekras\Speller\Ispell\Ispell;
use Mekras\Speller\Source\StringSource;

$className = 'App\index_model';
$web_indexer_model =  new $className;
$local_web_indexer_model =  new $className;

class webindexer_model extends Model
{
    var $totalDocs = 0;
    var $stop_words = array(1 => "a","about","above","after","again","against","all","am","an","and","any","are","aren't","as","at","be","because","been","before","being","below","between","both","but","by","can't","cannot","could","couldn't","did","didn't","do","does","doesn't","doing","don't","down","during","each","few","for","from","further","had","hadn't","has","hasn't","have","haven't","having","he","he'd","he'll","he's","her","here","here's","hers","herself","him","himself","his","how","how's","i","i'd","i'll","i'm","i've","if","in","into","is","isn't","it","it's","its","itself","let's","me","more","most","mustn't","my","myself","no","nor","not","of","off","on","once","only","or","other","ought","our","ours","ourselves","out","over","own","same","shan't","she","she'd","she'll","she's","should","shouldn't","so","some","such","than","that","that's","the","their","theirs","them","themselves","then","there","there's","these","they","they'd","they'll","they're","they've","this","those","through","to","too","under","until","up","very","was","wasn't","we","we'd","we'll","we're","we've","were","weren't","what","what's","when","when's","where","where's","which","while","who","who's","whom","why","why's","with","won't","would","wouldn't","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves");

    function __construct()
    {
    }

    public function searchQuery($query)
    {
        $keywords = array_values(array_unique(explode("|",$query)));
        $local_web_indexer_model = Cache::get('index_model');
        $local_model = $word_model = $local_web_indexer_model->word_list;
        $array = null;
        $word_model = null;

        for($index = 0; $index < sizeof($keywords); $index ++)
        {
            $word = $keywords[$index];
            if(array_key_exists($word,$local_model))
            {
                if($word_model==null)
                {
                    $word_model_temp = $local_web_indexer_model->word_list[$word];
                    $word_model_temp->word = $word;
                    $word_model[0] = $word_model_temp;
                }
                else
                {
                    $word_model_temp = $local_web_indexer_model->word_list[$word];
                    $word_model_temp->word = $word;
                    array_push($word_model,$word_model_temp);
                }
                $size = sizeof($word_model);

                for ($inner_index = $size-1; $inner_index > 0; $inner_index--)
                {
                    if($word_model[$inner_index]->inverse_document_frequency < $word_model[$inner_index-1]->inverse_document_frequency)
                    {
                        $temp = $word_model[$inner_index];
                        $word_model[$inner_index] = $word_model[$inner_index-1];
                        $word_model[$inner_index-1] = $temp;
                    }
                }
            }
        }

        if($word_model==null)
        {
            return "-1";
        }
        $document_id="";
        for($counter1 = 0; $counter1 < sizeof($word_model); $counter1 ++)
        {
            //echo $word_model[$counter1]->word." : ";
            $word_info = $word_model[$counter1]->cache_nodes_list;
            for($counter2 = 0; $counter2 < sizeof($word_info); $counter2 ++)
            {
                if($counter2>10)
                {
                    break;
                }
                $word_info[$counter2]->term_frequency = ceil($word_info[$counter2]->term_frequency);
                $document_id=$document_id.$word_info[$counter2]->document_id.",";
                //echo "[".ceil($word_info[$counter2]->term_frequency)."-(".$word_info[$counter2]->document_id.")]";
            }
            //echo "<br>";
        }
        $document_id=$document_id."-1";
        return $document_id;
    }

    public function readDocument()
    {
        $spchecker = new spellcheck("english.dic");
        $spchecker->buildIndex('english.dic', 'dict');
        $spell_dict = new spellcheck('dict');

        if (1!=1 && Cache::has('index_model'))
        {
            print_r(Cache::get('index_model'));
        }
        else
        {
            ini_set('max_execution_time', 300);
            ini_set('memory_limit', '13421772811');
            $query = "SELECT ID,KEY_WORD FROM webpages GROUP BY TITLE";
            $result = DB::select($query);
            foreach($result as $row)
            {
                $doc_id = $row->ID;
                $document = $row->KEY_WORD;
                $this->createTFIDFCache($document,$doc_id,$spell_dict);
            }
            $this->updateInverseDocumentFrequency();
            $this->updateCacheModel();
        }
    }

    public function createTFIDFCache($document,$doc_id,$spell_dict)
    {
        global $local_web_indexer_model;

        $dict = explode(" ",$document);

        for($counter = 0; $counter < sizeof($dict); $counter ++)
        {
            $word = $dict[$counter];

            if(!is_numeric($word) && !preg_match('/[^A-Za-z0-9]/', $word))
            {
                $this->updateLocalCacheModel($word,$doc_id,sizeof($dict),$spell_dict);
            }
        }
    }

    public function updateLocalCacheModel($word,$document_id,$total_words,$spell_dict)
    {
        global $local_web_indexer_model;
        if ($local_web_indexer_model==null || !array_key_exists($word,$local_web_indexer_model->word_list))
        {
            if(in_array($word, $this->stop_words) || !$spell_dict->checkWord($word))
            {
                return;
            }

            $temo_cache_node = new cache_node();
            $temo_cache_node->document_id = $document_id;
            $temo_cache_node->term_frequency = 1/$total_words;

            $temo_word_model = new word_model();
            $temo_word_model->inverse_document_frequency = 1;
            $this->totalDocs+=1;
            $temo_word_model->cache_nodes_list[] = new cache_node();

            $temo_word_model->cache_nodes_list[0] = $temo_cache_node;
            $local_web_indexer_model->word_list[$word] = $temo_word_model;

            return;
        }
        $doc_node = $this->getDocumentNode($word,$document_id);
        if($doc_node==-1)
        {
            $temo_cache_node = new cache_node();
            $temo_cache_node->document_id = $document_id;
            $temo_cache_node->inverse_document_frequency = 1;
            $temo_cache_node->term_frequency = 1/$total_words;
            $this->totalDocs+=1;
            array_push($local_web_indexer_model->word_list[$word]->cache_nodes_list,$temo_cache_node);
        }
        else
        {
            $local_web_indexer_model->word_list[$word]->cache_nodes_list[$doc_node]->term_frequency += 1/$total_words;
            $frequency = $local_web_indexer_model->word_list[$word]->cache_nodes_list[$doc_node]->term_frequency;
            $this->sortByTF($word,$doc_node,$document_id,$frequency);
        }
    }

    public function sortByTF($word,$doc_node,$document_id,$item_frequency)
    {
        global $local_web_indexer_model;
        $node_list = $local_web_indexer_model->word_list[$word]->cache_nodes_list;

        for ($counter = $doc_node; $counter > 0; $counter--)
        {
            if($node_list[$counter-1]->term_frequency < $node_list[$counter]->term_frequency)
            {
                $temp = $node_list[$counter-1];
                $node_list[$counter-1] = $node_list[$counter];
                $node_list[$counter] = $temp;
            }
        }
        $local_web_indexer_model->word_list[$word]->cache_nodes_list = $node_list;
    }

    public function getDocumentNode($word,$document_id)
    {
        global $local_web_indexer_model;

        $node_list = $local_web_indexer_model->word_list[$word]->cache_nodes_list;

        for ($counter = 0; $counter < sizeof($node_list); $counter++)
        {
            if($node_list[$counter]->document_id == $document_id)
            {
                return $counter;
            }
        }
        return -1;
    }

    public function updateInverseDocumentFrequency()
    {
        global $local_web_indexer_model;
        $keys = array_keys($local_web_indexer_model->word_list);
        for($counter1 = 0; $counter1 < sizeof($keys); $counter1 ++)
        {
            $word_info = $local_web_indexer_model->word_list[$keys[$counter1]];
            $docsize = sizeof($word_info->cache_nodes_list);
            $word_info->inverse_document_frequency = number_format(log($this->totalDocs/$docsize),2);
            $local_web_indexer_model->word_list[$keys[$counter1]]=$word_info;
        }
    }

    public function updateCacheModel()
    {
        global $local_web_indexer_model;
        global $web_indexer_model;

        $keys = array_keys($local_web_indexer_model->word_list);

        for($counter1 = 0; $counter1 < sizeof($keys); $counter1 ++)
        {
            $word_info = $local_web_indexer_model->word_list[$keys[$counter1]]->cache_nodes_list;
            echo $keys[$counter1]." : ".$local_web_indexer_model->word_list[$keys[$counter1]]->inverse_document_frequency;
            //for($counter2 = 0; $counter2 < sizeof($word_info); $counter2 ++)
            //{
            //    $word_info[$counter2]->term_frequency = ceil($word_info[$counter2]->term_frequency);
            //    echo "[".ceil($word_info[$counter2]->term_frequency)."-(".$word_info[$counter2]->document_id.")]";
            //}
            $local_web_indexer_model->word_list[$keys[$counter1]]->cache_nodes_list = $word_info;
            echo "<br>";
        }

        Cache::put('index_model',$local_web_indexer_model,300);
    }

}
