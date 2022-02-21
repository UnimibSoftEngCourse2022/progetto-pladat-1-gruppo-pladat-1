$(document).ready(function () {
    $(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
})
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

function isTitolo(titolo) {
	let regex = /^.{1,40}$/;
	return regex.test(titolo);
}

function isDurata(durata) {
	let regex = /^.{1,40}$/;
	return regex.test(durata);
}

function isSalario(salario) {
	let regex = /^\d+.{0,10}$/;
	return regex.test(salario);
}

if (document.URL.includes("login.html")) {
    //Code here
} else if(document.URL.includes("registrazione.html"))
{
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
} else if(document.URL.includes("private.html"))
{
    let chi = "utente"; //quiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
    function change() {
        if (chi === "utente") {
            $('.gazienda').addClass("nascondi");
            $('.gutente').removeClass("nascondi");
        }
        if (chi === "azienda") {
            $('.gazienda').removeClass("nascondi");
            $('.gutente').addClass("nascondi");
        }
    }
}
else{
    console.log("Problema di URL");
}



function invioDati() {
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='nome']").get(0).setCustomValidity("Il nome deve avere dai 3 ai 20 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='cognome']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='data']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='email1']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='password1']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='nomeCompagnia']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").get(0).setCustomValidity("La vai deve avere dai 3 ai 50 caratteri. CONSIGLIATO usare quela proposta da BING maps.");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("textarea[name='descrizione1']").get(0).setCustomValidity("Non è richiesta una descrizione (massimo 200 caratteri)");
	$("#invioDatiRegistrazione").parent().children(".gruppo").children("input[name='data']").val("");
	$("#invioDatiRegistrazione").click(function () {
		if ($('#studente').is(':checked')) {
			let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
			let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
			let nome = $(this).parent().children(".gruppo").children("input[name='nome']").val().trim().toLowerCase();
			let cognome = $(this).parent().children(".gruppo").children("input[name='cognome']").val().trim().toLowerCase();
			let data = $(this).parent().children(".gruppo").children("input[name='data']").val();
			if (!isEmail(email)) {
				$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#1a73e8");
			}
			if (!isPassword(password)) {
				$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#1a73e8");
			}
			if (!isNome(nome)) {
				$(this).parent().children(".gruppo").children("input[name='nome']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nome']").css("border-color", "#1a73e8");
			}
			if (!isCognome(cognome)) {
				$(this).parent().children(".gruppo").children("input[name='cognome']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='cognome']").css("border-color", "#1a73e8");
			}
			if (!isData(data)) {
				$(this).parent().children(".gruppo").children("input[name='data']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='data']").css("border-color", "#1a73e8");
			}
			if($("#categoria").val().length===0) {
				$("#categoria").css("border-color", "#ea4335");
			}
			else {
				$("#categoria").css("border-color", "#1a73e8");
			}
		}
		if ($('#azienda').is(':checked')) {
			let email1 = $(this).parent().children(".gruppo").children("input[name='email1']").val().trim().toLowerCase();
			let password1 = $(this).parent().children(".gruppo").children("input[name='password1']").val().trim();
			let nomeCompagnia = $(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").val().trim().toLowerCase();
			let via = $(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").val().trim().toLowerCase();
			let descrizione1 = $(this).parent().children(".gruppo").children("textarea[name='descrizione1']").val().trim();
			if (!isEmail(email1)) {
				$(this).parent().children(".gruppo").children("input[name='email1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='email1']").css("border-color", "#1a73e8");
			}
			if (!isPassword(password1)) {
				$(this).parent().children(".gruppo").children("input[name='password1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='password1']").css("border-color", "#1a73e8");
			}
			if (!isNomeCompagnia(nomeCompagnia)) {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").css("border-color", "#1a73e8");
			}
			if (!isVia(via)) {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").css("border-color", "#1a73e8");
			}
			if (!isDescrizione(descrizione1)) {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").css("border-color", "#1a73e8");
			}
		}
	});
}

function invioDati() {
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password non può essere nulla");
	$("#invioDatiLogin").click(function () {
		let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
		let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
		if (!isEmail(email)) {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#1a73e8");
		}
		if (!isPassword(password)) {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#1a73e8");
		}
	});
}

function invioDati() {
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='nome']").get(0).setCustomValidity("Il nome deve avere dai 3 ai 20 caratteri");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='cognome']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='data']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='email1']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='password1']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='nomeCompagnia']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$("#invioDatiPrivato").parent().children(".gruppo").children("select").get(0).setCustomValidity("Seleziona almeno una categoria");
	$("#invioDatiPrivato").parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").get(0).setCustomValidity("La vai deve avere dai 3 ai 50 caratteri. CONSIGLIATO usare quela proposta da BING maps.");
	$("#invioDatiPrivato").parent().children(".gruppo").children("textarea[name='descrizione1']").get(0).setCustomValidity("Non è richiesta una descrizione (massimo 200 caratteri)");
	$("#invioDatiPrivato").parent().children(".gruppo").children("input[name='data']").val("");
	$("#invioDatiPrivato").click(function () {
		if (chi === "utente") {
			let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
			let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
			let nome = $(this).parent().children(".gruppo").children("input[name='nome']").val().trim().toLowerCase();
			let cognome = $(this).parent().children(".gruppo").children("input[name='cognome']").val().trim().toLowerCase();
			let data = $(this).parent().children(".gruppo").children("input[name='data']").val();
			if (!isEmail(email)) {
				$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#1a73e8");
			}
			if (!isPassword(password)) {
				$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#1a73e8");
			}
			if (!isNome(nome)) {
				$(this).parent().children(".gruppo").children("input[name='nome']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nome']").css("border-color", "#1a73e8");
			}
			if (!isCognome(cognome)) {
				$(this).parent().children(".gruppo").children("input[name='cognome']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='cognome']").parent().children("input").css("border-color", "#1a73e8");
			}
			if (!isData(data)) {
				$(this).parent().children(".gruppo").children("input[name='data']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='data']").css("border-color", "#1a73e8");
			}
			if ($("#categoria").val().length === 0) {
				$("#categoria").css("border-color", "#ea4335");
			} else {
				$("#categoria").css("border-color", "#1a73e8");
			}
			location.reload();
		}
		if (chi === "azienda") {
			let email1 = $(this).parent().children(".gruppo").children("input[name='email1']").val().trim().toLowerCase();
			let password1 = $(this).parent().children(".gruppo").children("input[name='password1']").val().trim();
			let nomeCompagnia = $(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").val().trim().toLowerCase();
			let via = $(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").val().trim().toLowerCase();
			let descrizione1 = $(this).parent().children(".gruppo").children("textarea[name='descrizione1']").val().trim();
			if (!isEmail(email1)) {
				$(this).parent().children(".gruppo").children("input[name='email1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='email1']").css("border-color", "#1a73e8");
			}
			if (!isPassword(password1)) {
				$(this).parent().children(".gruppo").children("input[name='password1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='password1']").css("border-color", "#1a73e8");
			}
			if (!isNomeCompagnia(nomeCompagnia)) {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='nomeCompagnia']").css("border-color", "#1a73e8");
			}
			if (!isVia(via)) {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").css("border-color", "#1a73e8");
			}
			if (!isDescrizione(descrizione1)) {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").css("border-color", "#ea4335");
			} else {
				$(this).parent().children(".gruppo").children("input[name='descrizione1']").css("border-color", "#1a73e8");
			}
			location.reload();
		}
	});
}

function startModifica() {
	$("#invioDatiPrivato").css("display", "none");
	$("#modificaPrivato").click(function () {
		if ($(this).text() === "Modifica") {
			if (chi === "azienda") {
				$(".gazienda").children().prop("disabled", false);
			}
			if (chi === "utente") {
				$(".gutente").children().prop("disabled", false);
			}
			$("#invioDatiPrivato").css("display", "block");
			$("#modificaPrivato").text("Annulla");
		} else {
			if (chi === "utente") {
				location.reload();
			}
			if (chi === "azienda") {
				location.reload();
			}
		}
	});
}

function invioDati2() {
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='titolo']").get(0).setCustomValidity("Il titolo deve avere da 1 a 40 caratteri");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='durata']").get(0).setCustomValidity("La durata è obbligatoria (es: 3 settimane)");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataInizio']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataFine']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("textarea[name='descrizione2']").get(0).setCustomValidity("La descrizione non è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='salario']").get(0).setCustomValidity("Il salario non è obbligatorio");
	$("#invioDatiOfferta").parent().children(".gruppo").children("select").get(0).setCustomValidity("Seleziona almeno una categoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataFine']").val("");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataInizio']").val("");
	$("#invioDatiOfferta").click(function () {
		let titolo = $(this).parent().children(".gruppo").children("input[name='titolo']").val().trim().toLowerCase();
		let durata = $(this).parent().children(".gruppo").children("input[name='durata']").val().trim().toLowerCase();
		let dataInizio = $(this).parent().children(".gruppo").children("input[name='dataInizio']").val();
		let dataFine = $(this).parent().children(".gruppo").children("input[name='dataFine']").val();
		let descrizione2 = $(this).parent().children(".gruppo").children("textarea[name='descrizione2']").val().trim().toLowerCase();
		let salario = $(this).parent().children(".gruppo").children("input[name='salario']").val().toLowerCase();
		if (!isTitolo(titolo)) {
			$(this).parent().children(".gruppo").children("input[name='titolo']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='titolo']").css("border-color", "#1a73e8");
		}
		if (!isDurata(durata)) {
			$(this).parent().children(".gruppo").children("input[name='durata']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='durata']").css("border-color", "#1a73e8");
		}
		if (!isData(dataInizio)) {
			$(this).parent().children(".gruppo").children("input[name='dataInizio']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='dataInizio']").css("border-color", "#1a73e8");
		}
		if (!isData(dataFine)) {
			$(this).parent().children(".gruppo").children("input[name='dataFine']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='dataFine']").css("border-color", "#1a73e8");
		}
		if (!isDescrizione(descrizione2)) {
			$(this).parent().children(".gruppo").children("input[name='descrizione2']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='descrizione2']").css("border-color", "#1a73e8");
		}
		if (!isSalario(salario)) {
			$(this).parent().children(".gruppo").children("input[name='salario']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='salario']").css("border-color", "#1a73e8");
		}
		if ($("#categoria1").val().length === 0) {
			$("#categoria1").css("border-color", "#ea4335");
		} else {
			$("#categoria1").css("border-color", "#1a73e8");
		}
	});
}