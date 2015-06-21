$(function () {

	getmatches();

$(document).on("click", "a.trash", function(e) {
	var xurl = $("#deleteurl").val();
    e.preventDefault();
    $.ajax({
		url: xurl ,
		success: function (response) {
		getmatches();
		}
		});
	
});


setInterval(getmatches, 9000);

function getmatches() {
		var templateSource = $("#results-template").html();
		var template = Handlebars.compile(templateSource);
		var resultsPlaceholder = $("#matchrequests");
		 
		 
		$.ajax({
		url: '/json/match/1/by_user',
		success: function (response) {
		resultsPlaceholder.html(template({'response':response}));
		}
		});
}



});
