$( document ).ready(function() {
    console.log("mainmenu.js is loaded!");
    getDate();
    loadChores();
});

function getDate(){
	
}

function loadChores(){
	var apikey = window.localStorage.getItem('apikey');
	console.log(apikey);
	$.post("http://hackillinois.newelementgaming.net/api/everything", {apikey: apikey}, function(data) {
		console.log(data);
		var user = data.user;
		var apartment = data.user.apartment;
		var listOfChores = data.listOfChores;
		var userChores = data.userChores;

		console.log("User: " + JSON.stringify(user));
		console.log("Apartment: " + JSON.stringify(apartment));
		console.log("listOfChores: " + JSON.stringify(listOfChores));
		console.log("userChores:" + JSON.stringify(userChores));

		var choresCount = userChores.length;
		console.log(choresCount);

		if(userChores.length == 0){
			$(".chores").append("<div class='lead'>No chores today, please check back tomorrow</div>")
		}else{
			for (var i = 0; i < userChores.length; i++) {
				$(".chores").append("<div class='lead'>" + userChores[i].name + "</div><hr class='choreNameHr'><button class='btn btn-success choreComplete'>Complete <i class='fa fa-check'></i></button><button class='btn btn-default'>Info</button>");
			}
		}

		for(key in listOfChores){
			$(".roomates").append("<h4>" + key + "</h4><div class='progress'><div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width: 60%;'></div>");
			for (var i = 0; i < listOfChores[key].length; i++) {
				$(".roomates").append("<hr><h5>" + listOfChores[key].name + "</h5>")
			}
			console.log(listOfChores[key]);
			console.log(key);
		}


	});

}