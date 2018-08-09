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
		document.getElementById(currentCatagory).className += constants.emptySpace + constants.currentCatagoryState;
	}

	resetCatagory(){
		var currentActiveTab = document.getElementById(currentCatagory).className.replace(constants.emptySpace + constants.currentCatagoryState, constants.emptyString);
		document.getElementById(currentCatagory).className = currentActiveTab;
	} 

}

// global : constants
const search_manager = new searchManager();

// global : variables
var currentCatagory = constants.currentCatagoryType;

// global : functions
function onPageLoad()
{
}


