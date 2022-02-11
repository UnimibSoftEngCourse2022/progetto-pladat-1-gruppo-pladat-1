$(document).ready(function () {
	setInterval(myfunct, 2000);
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	$(".elenco-privato").css('height', ($("#iscrizione").height() + 63.20) + "px");
	blurr();
})
$(window).on('resize', function () {
	$(".elenco-privato").css('height', ($("#iscrizione").height() + 63.20) + "px");
});

let count = 1;

function myfunct() {
	if (count == 0) {
		$("#motivatore").html("Semplice");
	} else if (count == 1) {
		$("#motivatore").html("Porfessionale");
	} else {
		$("#motivatore").html("Adatto a te");
	}
	count++;
	count = count % 3;
	$("#motivatore").removeClass("fadeIn");
	$("#motivatore").width();
	$("#motivatore").addClass("fadeIn");
}

function blurr() {
	$(".gruppo > input[type=date]").focus(function () {
		$(this).css("color", "#3c4043");
	});
	$(".gruppo > input, .gruppo>textarea").focus(function () {
		$(this).parent().addClass("gruppo-evidenziato");
	});
	$(".gruppo > input, .gruppo>textarea").focusout(function () {
		if ($(this).val().trim() === "") {
			$(this).parent().removeClass("gruppo-evidenziato");
			$(this).val("");
		}
	});
	$(".gruppo > div>input").focus(function () {
		$(this).parent().parent().addClass("gruppo-evidenziato");
	});
	$(".gruppo > div>input").focusout(function () {
		if ($(this).val().trim() === "") {
			$(this).parent().parent().removeClass("gruppo-evidenziato");
			$(this).val("");
		}
	});
	$(".gruppo > label").click(function () {
		$(this).parent().addClass("gruppo-evidenziato");
		$(this).parent().children("input").focus();
	});
}

function loadMapScenario() {
	Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', {
		callback: onLoad,
		errorCallback: onError
	});

	function onLoad() {
		var options = {
			maxResults: 5
		};
		var manager = new Microsoft.Maps.AutosuggestManager(options);
		manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
	}

	function onError(message) {
		document.getElementById('printoutPanel').innerHTML = message;
	}

	function selectedSuggestion(suggestionResult) {
		document.getElementById('printoutPanel').innerHTML =
			'Suggestion: ' + suggestionResult.formattedSuggestion +
			'<br> Lat: ' + suggestionResult.location.latitude +
			'<br> Lon: ' + suggestionResult.location.longitude;
	}

}