$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	blurr();
	scrittura();
	change();
	invioDati();
})

function scrittura() {
	$('.invito').typeIt({
		speed: 100,
		startDelay: 1000,
		loop: true,
		loopDelay: 5000,
	}).tiType("Registrati ora! È semplice!")
}

function blurr() {
	$(".gruppo > input[type=date]").focus(function () {
		$(this).css("color", "#3c4043");
	});
	$(".gruppo > input[type=date]").focusout(function () {
		if ($(this).val().trim() === "") {
			$(this).parent().removeClass("gruppo-evidenziato");
			$(this).val("");
			$(this).css("color", "white");
		}
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

	function onError(message) {}

	function selectedSuggestion(suggestionResult) {
		$('#searchBox').val(suggestionResult.formattedSuggestion);
	}
}

function change() {
	if ($('#studente').is(':checked')) {
		$('.gazienda').addClass("nascondi");
		$('.gutente').removeClass("nascondi");
	}
	if ($('#azienda').is(':checked')) {
		$('.gazienda').removeClass("nascondi");
		$('.gutente').addClass("nascondi");
	}
	$("input[type='radio']").change(function () {
		if ($('#studente').is(':checked')) {
			$('.gazienda').addClass("nascondi");
			$('.gutente').removeClass("nascondi");
		}
		if ($('#azienda').is(':checked')) {
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

function isNome(nome) {
	let regex = /^.{3,20}$/;
	return regex.test(nome);
}

function isCognome(cognome) {
	let regex = /^.{3,30}$/;
	return regex.test(cognome);
}

function isData(data) {
	let regex = /^.{1,30}$/;
	return regex.test(data);
}

function isNomeCompagnia(nomeCompagnia) {
	let regex = /^.{3,30}$/;
	return regex.test(nomeCompagnia);
}

function isVia(via) {
	let regex = /^.{3,50}$/;
	return regex.test(via);
}

function isDescrizione(descrizione) {
	let regex = /^.{0,200}$/;
	return regex.test(descrizione);
}

function invioDati() {
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='nome']").get(0).setCustomValidity("Il nome deve avere dai 3 ai 20 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='cognome']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='data']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("textarea[name='descrizione']").get(0).setCustomValidity("Non è richiesta una descrizione (massimo 200 caratteri)");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='email1']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='password1']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='nomeCompagnia']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").get(0).setCustomValidity("La vai deve avere dai 3 ai 50 caratteri. CONSIGLIATO usare quela proposta da BING maps.");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("textarea[name='descrizione1']").get(0).setCustomValidity("Non è richiesta una descrizione (massimo 200 caratteri)");
	$(this).parent().children(".gruppo").children("input[name='data']").val("");
	$("#invioDatiRegistrazione").click(function () {
		if ($('#studente').is(':checked')) {
			let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
			let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
			let nome = $(this).parent().children(".gruppo").children("input[name='nome']").val().trim().toLowerCase();
			let cognome = $(this).parent().children(".gruppo").children("input[name='cognome']").val().trim().toLowerCase();
			let data = $(this).parent().children(".gruppo").children("input[name='data']").val();
			let descrizione = $(this).parent().children(".gruppo").children("textarea[name='descrizione']").val().trim();
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
			if (!isNome(nome)) {
				$(this).parent().children(".gruppo").children("input[name='nome']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nome']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isCognome(cognome)) {
				$(this).parent().children(".gruppo").children("input[name='cognome']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='cognome']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isData(data)) {
				$(this).parent().children(".gruppo").children("input[name='data']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='data']").parent().children("input").css("border-color", "#1a73e8");
			}

			if (!isDescrizione(descrizione)) {
				$(this).parent().children(".gruppo").children("textarea[name='descrizione']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("textarea[name='descrizione']").parent().children("input").css("border-color", "#1a73e8");
			}
		}
		if ($('#azienda').is(':checked')) {
			let email1 = $(this).parent().children(".gruppo").children("input[name='email1']").val().trim().toLowerCase();
			let password1 = $(this).parent().children(".gruppo").children("input[name='password1']").val().trim();
			let nomeCompagnia = $(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").val().trim().toLowerCase();
			let via = $(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").val().trim().toLowerCase();
			let descrizione1 = $(this).parent().children(".gruppo").children("textarea[name='descrizione1']").val().trim();
			if (!isEmail(email1)) {
				$(this).parent().children(".gruppo").children("input[name='email1']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='email1']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isPassword(password1)) {
				$(this).parent().children(".gruppo").children("input[name='password1']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='password1']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isNomeCompagnia(nomeCompagnia)) {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isVia(via)) {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isDescrizione(descrizione1)) {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").parent().children("input").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").parent().children("input").css("border-color", "#1a73e8");
			}
		}
	});
}