// search-manager : class
class searchManager {

    constructor() {
	}
	
	onCatagorySelected(catagory){
		if(currentCatagory !== catagory){
			this.resetCatagory();
			currentCatagory = catagory;
			this.selectCatagory();
		}
	}

	selectCatagory(){
		document.getElementById(currentCatagory).style.color = "#1a88ed";
		document.getElementById(currentCatagory).style.fontWeight = "bold";
		document.getElementById(currentCatagory).style.borderBottom = "3px solid #1A73E8";
	}

	resetCatagory(){
		document.getElementById(currentCatagory).style.color = "#77778c";
		document.getElementById(currentCatagory).style.fontWeight = "normal";
		document.getElementById(currentCatagory).style.borderBottom = "0px";
	}

}

// global : variables
const search_manager = new searchManager();
var currentCatagory = "catagory_all";

// global : functions
function onPageLoad(){
	search_manager.selectCatagory();
}


