$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	blurr();
	scrittura();
	invioDati();
	change();
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

function change()
{
	if($('#studente').is(':checked'))
		{
			$('.gazienda').addClass("nascondi");
			$('.gutente').removeClass("nascondi");
		}
		if($('#azienda').is(':checked'))
		{
			$('.gazienda').removeClass("nascondi");
			$('.gutente').addClass("nascondi");
		}
	$("input[type='radio']").change(function()
	{
		if($('#studente').is(':checked'))
		{
			$('.gazienda').addClass("nascondi");
			$('.gutente').removeClass("nascondi");
		}
		if($('#azienda').is(':checked'))
		{
			$('.gazienda').removeClass("nascondi");
			$('.gutente').addClass("nascondi");
		}
	});
}

function isEmail(email) {
	let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function isPassword(password) {
	let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	return regex.test(password);
}

function invioDati() {
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una letta maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiLogin").click(function () {
		let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
		let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
		if (!isEmail(email)) {
			$(this).parent().children(".gruppo").children("input[name='email']").parent().children("input").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='email']").parent().children("input").css("border-color", "#1a73e8");
		}
		if (!isPassword(password)) {
			$(this).parent().children(".gruppo").children("input[name='password']").parent().children("input").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='password']").parent().children("input").css("border-color", "#1a73e8");
		}
	});
}