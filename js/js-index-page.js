// Variables

var isSearchBoxSelected = false



// Helper Method

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

function onSearchButtonHoverStyle(id) 
{
    document.getElementById(id).style.color = "#000000";
    document.getElementById(id).style.backgroundColor = "#e8e8e8";
    document.getElementById(id).style.boxShadow = " 0px 3px 6px -1.5px #cccccc";
}

function onSearchButtonOutStyle(id) 
{
    document.getElementById(id).style.color = "#6c6c6c";
    document.getElementById(id).style.borderWidth = "0px";
    document.getElementById(id).style.backgroundColor = "#f2f2f2";
    document.getElementById(id).style.boxShadow = "0 0px 0px 0px #999999";
}
