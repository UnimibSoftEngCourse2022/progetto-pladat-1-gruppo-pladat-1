$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	blurr();
	scrittura();
})

function scrittura()
{
	$('.invito').typeIt({
		speed: 100,
  		startDelay: 1000,
		loop:true,
		loopDelay:5000,
	}).tiType("Registrati ora! &#200; semplice!")
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
		var options = { maxResults: 5 };
		var manager = new Microsoft.Maps.AutosuggestManager(options);
		manager.attachAutosuggest('#searchBox', '#searchBoxContainer', selectedSuggestion);
	}
	function onError(message) {
	}

	function selectedSuggestion(suggestionResult) {
		$('#searchBox').val(suggestionResult.formattedSuggestion);
	}
}	