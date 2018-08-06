// Variables

var currentCatagory = "catagory_all";

// Helper Method : Filtered Catagory

function onPageLoad()
{
	selectCatagory(currentCatagory);
}

function onCatagorySelected(catagory) 
{
	if(currentCatagory !== catagory)
	{
		resetCatagory(currentCatagory);
		currentCatagory = catagory;
		selectCatagory(currentCatagory);
	}
}

function selectCatagory(catagory)
{
	document.getElementById(catagory).style.color = "#1a88ed";
	document.getElementById(catagory).style.fontWeight = "bold";
	document.getElementById(catagory).style.borderBottom = "3px solid #1A73E8";
}
function resetCatagory(catagory)
{
	document.getElementById(catagory).style.color = "#77778c";
	document.getElementById(catagory).style.fontWeight = "normal";
	document.getElementById(catagory).style.borderBottom = "0px";
}
