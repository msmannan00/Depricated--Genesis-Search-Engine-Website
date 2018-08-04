// Variables

var currentCatagory = "catagory_all"
var isSearchBoxSelected = false

// Helper Method

function onPageLoad()
{
    document.getElementById(currentCatagory).style.color = "#1a88ed";
    document.getElementById(currentCatagory).style.fontWeight = "bold";
    document.getElementById(currentCatagory).style.borderBottom = "3px solid #1A73E8";
}

function onCatagorySelected(catagory) 
{
	if(currentCatagory != catagory)
	{
		document.getElementById(catagory).style.color = "#1a88ed";
		document.getElementById(catagory).style.fontWeight = "bold";
		document.getElementById(catagory).style.borderBottom = "3px solid #1A73E8";

		document.getElementById(currentCatagory).style.color = "#77778c";
		document.getElementById(currentCatagory).style.fontWeight = "normal";
		document.getElementById(currentCatagory).style.borderBottom = "0px";

		currentCatagory = catagory;
	}
}

function onCatagoryMouseOver(catagory) 
{
	if(catagory != currentCatagory)
	{
		document.getElementById(catagory).style.color = "#000000";
	}
}

function onCatagoryMouseOut(catagory) 
{
	if(catagory != currentCatagory)
	{
		document.getElementById(catagory).style.color = "#77778c";
	}
}

function onSerchBoxSelected() 
{
    document.getElementById("searchbox").style.boxShadow = " 0px 4px 12px -1.5px #cccccc";
	isSearchBoxSelected = true
}

function onSerchBoxMouseOver() 
{
    document.getElementById("searchbox").style.boxShadow = " 0px 4px 12px -1.5px #cccccc";
}

function onSerchBoxMouseOut() 
{
	if(!isSearchBoxSelected)
	{
		document.getElementById("searchbox").style.boxShadow = "0 1.5px 1.5px -1.5px #999999";
	}
}

function onSerchBoxUnSelected() 
{
	document.getElementById("searchbox").style.boxShadow = "0 1.5px 1.5px -1.5px #999999";
	isSearchBoxSelected = false
}
