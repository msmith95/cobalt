$( document ).ready(function() {
    console.log("mainmenu.js is loaded!");
    loadChores();
});

function toggler(divID) {
    $("#info" + divID).toggle();
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
				console.log(userChores[i].finished_today);
				if(userChores[i].finished_today === "Yes"){
					$(".chores").append("<div class='lead'>" + userChores[i].name + "</div><p id='info" + i + "' style='display:none;'>" + userChores[i].description + "</p><button class='btn btn-success choreComplete disabled' onclick='completeChore("+userChores[i].id+")' id='complete-"+userChores[i].id+"' >Complete <i class='fa fa-check'></i></button><button class='btn btn-default ' onclick='toggler(" + i + ")'>Info</button><hr>");
				}else{
					$(".chores").append("<div class='lead'>" + userChores[i].name + "</div><p id='info" + i + "' style='display:none;'>" + userChores[i].description + "</p><button class='btn btn-success choreComplete' onclick='completeChore("+userChores[i].id+")' id='complete-"+userChores[i].id+"' >Complete <i class='fa fa-check'></i></button><button class='btn btn-default' onclick='toggler(" + i + ")'>Info</button><hr>");
				}
			}
		}

		$(".chores hr").last().remove();
		var progress = 0;
		var i = 0;
		for(key in listOfChores){
			console.log("completed: " + apartment.user[i].numberOfCompletedChores);
			console.log("incompleted: " + apartment.user[i].numberOfIncompletedChores)
			progress = apartment.user[i].numberOfCompletedChores / apartment.user[i].numberOfCompletedChores + apartment.user[i].numberOfIncompletedChores;
			i++;
			console.log("progress: " + progress);
			$(".roomates").append("<h4>" + key + "</h4><div class='progress'><div class='progress-bar' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width: " + progress * 100 + "%;'></div>");
			if (listOfChores[key].length != 0) {
				for (var i = 0; i < listOfChores[key].length; i++) {
					if (listOfChores[key][i].finished_today == "Yes") {
						$(".roomates").append("<h5>" + listOfChores[key][i].name + ":    <i class='fa fa-check'></i></h5>");
					}else{
						$(".roomates").append("<h5>" + listOfChores[key][i].name + ":    <i class='fa fa-times'></i></h5>");
					}
				}
			}else{
				$(".roomates").append("<h5>No Chores Today!</h5>");
			}
			$(".roomates").append("<hr>");
			console.log(listOfChores[key].length);
			console.log(key);
		}

		$(".roomates hr").last().remove();
		$(".info").append("<div class='lead'><b>Apartment Info</b></div>");
		$(".info").append("<h5>Apartment Name: " + apartment.name + "</h5><h5>Apartment ID: " + apartment.id + "</h5>");
		$(".info").append("<br><div class='lead'><strong>User Info</strong></div>");
		$(".info").append("<h5>User Name: " + user.name + "</h5><h5>User ID: " + user.id + "</h5>");

	});

}

function completeChore (id){
	var apikey = window.localStorage.getItem('apikey');
	$.post("http://hackillinois.newelementgaming.net/api/completeChore", {apikey: apikey, choreId: id}, function(data) {
		$('#complete-'+id).addClass('disabled');
		console.log(data);
	});
}