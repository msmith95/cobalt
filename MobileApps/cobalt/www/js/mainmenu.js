$( document ).ready(function() {
    console.log("mainmenu.js is loaded!");
    getDate();
    loadChores();
});

function getDate(){
	
}

function loadChores(){
	var apikey = window.localStorage.getItem('apikey');

	$.post( "http://hackillinois.newelementgaming.net/api/chores", {apikey: apikey}, function(data) {

	});

}