$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	$(".elenco-privato").css('height', ($("#modifica").height() + 63.20) + "px");
	blurr();
	infoOfferte();
})

$(window).on('resize', function () {
	$(".elenco-privato").css('height', ($("#modifica").height() + 63.20) + "px");
});

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
function infoOfferte()
{
	let ilMioHtml="";
	$(".privato-placement").hover(
	function() {
    ilMioHtml=$(this).html();
		$(this).html("<p data-bs-toggle='modal' data-bs-target='#informazioni'>Informazioni</p><p data-bs-toggle='modal' data-bs-target='#applicanti'>Applicanti</p>");
    },function() {
        $(this).html(ilMioHtml);
    });
	$(".bloccoelencoapplicanti").hover(
		function() {
		$(this).children().eq(1).removeClass("nascondi");
		},function() {
			$(this).children().eq(1).addClass("nascondi");
		});
}	

