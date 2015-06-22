$(function () {

	$(document).on("click", "a.find", function(e) {
		
	    e.preventDefault();
		var xurl = $(this).attr('href');
		getavailablematches(xurl);
		});

	$(document).on("click", "a.trash", function(e) {
	    e.preventDefault();
		var xurl = $(this).attr('href');
	    console.log(xurl);
	    $.ajax({
			url: xurl ,
			success: function (response) {
			getmatches();
			}
			});

	 getmatchreq();
	
});


setInterval(getmatchreq, 1000);

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
		console.log(response);
		console.log(resultsPlaceholder.html(template({'response':response})));
		}
		});
}



});
