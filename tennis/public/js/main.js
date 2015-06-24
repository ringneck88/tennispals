$(function () {

	comfirmed();
	getmatchreq();
	getLocations();
	getChallenges();
   
    $(document).on("click", "a.acptchallenge", function(e) {
	    e.preventDefault();
		var xurl = $(this).attr('href');
	
	    $.ajax({
			url: xurl ,
			success: function (response) {
			getChallenges();
		}

	});
	});

	$(document).on("click", "a.find", function(e) {
		
	    e.preventDefault();
		var xurl = $(this).attr('href');
		getavailablematches(xurl);
	});

	$(document).on("click", "a.trash", function(e) {
	    e.preventDefault();
		var xurl = $(this).attr('href');
	    
	    $.ajax({
			url: xurl ,
			success: function (response) {
			getmatches();
		}
	}
	);

});


setInterval(comfirmed, 1000);
setInterval(getmatchreq, 1000);
setInterval(getLocations, 1000);
setInterval(getChallenges, 1000);

function comfirmed() {

		var templateSource = $("#confirmed-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#confirmed");
		 
		 
		$.ajax({
		url: '/json/matches/confirmed',
		success: function (response) {
			resultsPlaceholder.html(template({'response':response}));
		}
		});
}

function getChallenges() {

		var templateSource = $("#challenges-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#challenges");
		 
		 
		$.ajax({
		url: '/json/match/challenges',
		success: function (response) {
			resultsPlaceholder.html(template({'response':response}));
		}
		});
}

function getmatchreq() {

		var templateSource = $("#matchreq-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#matchrequests");
		 
		 
		$.ajax({
		url: '/json/match/'+ currentuser +'/by_user',
		success: function (response) {
			resultsPlaceholder.html(template({'response':response}));
		}
		});
}

function getavailablematches(xurl) {

		var templateSource = $("#amatches-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#amatches");
		 
		$.ajax({
		url: xurl,
		success: function (response) {
			resultsPlaceholder.html(template({'response':response}));
		}
		});
}

function getLocations(xurl) {

		var templateSource = $("#alllocations-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#alllocations");
		 
		$.ajax({
		url: '/json/locations' ,
		success: function (response) {
				resultsPlaceholder.html(template({'response':response}));
		}
		});
}


});
