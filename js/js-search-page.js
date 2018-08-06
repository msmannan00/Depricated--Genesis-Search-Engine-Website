// search-manager : class
class searchManager {

    constructor() {
	}
	
	onCatagorySelected(catagory){
		this.resetCatagory();
		currentCatagory = catagory;
		this.selectCatagory();
	}

	selectCatagory(){
		document.getElementById(currentCatagory).className += " active";
	}

	resetCatagory(){
		var currentActiveTab = document.getElementById(currentCatagory).className.replace(" active", "");
		document.getElementById(currentCatagory).className = currentActiveTab;
	} 

}

// global : constants
const search_manager = new searchManager();

// global : variables
var currentCatagory = "catagory_all";

// global : functions
function onPageLoad(){
	
}


