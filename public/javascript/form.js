/*<p class="attendo">&#10140;</p>*/
let who="";
let email="";

$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val("");
	invioDati();
})

$(window).on('load', function () {
    $(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
});

function logout()
{
	$(document).on("click",".logout-button",function() {
		$.get("/logout").done((mess)=>{
			window.location.href = "/";
		})
	})
}


function caricaPlacement()
{
	let tmp="";
	$.get("/employer/"+email+"/placementopen").done((mess1)=>{
		for(let row of mess1)
		{
			tmp="<div id='"+row['id']+"' class='privato-placement'><p>'"+row['title']+"'</p><p></p><p class='accetto'>&#10004;</p></div>"
			$(".elenco-privato").children("div").eq(1).append(tmp);
		}
	});
	$.get("/employer/"+email+"/placementclosed").done((mess1)=>{
		for(let row of mess1)
		{
			tmp="<div id='"+row['id']+"' class='privato-placement'><p>'"+row['title']+"'</p><p></p><p class='rifiuto'>&#10006;</p></div>";
			$(".elenco-privato").children("div").eq(1).append(tmp);
		}
	})
}

function caricaInformazioniPlacement()
{
	if(document.URL.includes("/profile"))
	{
		$(document).on("click",".privato-placement > p:nth-child(1)",function() {
			$.get("/placement/"+$(this).parent().attr('id')+"/byid").done((mess)=>{
				mess=mess[0];
				$(".tirocinio >p> .mCompagnia").text(mess['name']);
				$(".tirocinio >p> .mEmail").text(mess['email']);
				$(".tirocinio >p> .mTitolo").text(mess['title']);
				$(".tirocinio >p> .mStipendio").text(mess['salary']);
				$(".tirocinio >p> .mDurata").text(mess['duration']);
				$(".tirocinio >p> .mInizio").text(mess['start_date']);
				$(".tirocinio >p> .mFine").text(mess['expiration_date']);
			})
		})
	}
	else
	{
		$(document).on("click",".privato-placement > p:nth-child(1)",function() {
			$.get("/placement/"+$(this).parent().attr('id')+"/byid").done((mess)=>{
				mess=mess[0];
				$(".tirocinio mCompagnia").text(mess['name']);
				$(".tirocinio mEmail").text(mess['employer_email']);
				$(".tirocinio mTitolo").text(mess['title']);
				$(".tirocinio mStipendio").text(mess['salary']);
				$(".tirocinio mDurata").text(mess['duration']);
				$(".tirocinio mInizio").text(mess['start_date']);
				$(".tirocinio mFine").text(mess['expiration_date']);
			})
		})		
	}
}


function caricaInformazioniAzienda()
{
	
}

function caricaApplicanti()
{
	
}

function applica()
{
	
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

function isPasswordLogin(cognome) {
	let regex = /^.{1,30}$/;
	return regex.test(cognome);
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
	let regex = /^.{3,100}$/;
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

function isCaptcha()
{
	if($('[name=h-captcha-response]').val()!=="") //Non è possibile controllare altro da localhost
	{
		return true;
	}
	else
	{
		return false;
	}
} 
function isDurata(durata) {
	let regex = /^.{1,10}$/;
	return regex.test(durata);
}

function isSalario(salario) {
	let regex = /^\d+.{0,10}$/;
	return regex.test(salario);
}

function checkAzienda(id) {
	$(id).parent().children(".gruppo").children("input[name='email1']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$(id).parent().children(".gruppo").children("input[name='password1']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$(id).parent().children(".gruppo").children("input[name='nomeCompagnia']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$(id).parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").get(0).setCustomValidity("La vai deve avere dai 3 ai 100 caratteri. CONSIGLIATO usare quela proposta da BING maps.");
	$(id).parent().children(".gruppo").children("textarea[name='descrizione1']").get(0).setCustomValidity("Non è richiesta una descrizione (massimo 200 caratteri)");
	$(id).parent().children(".gruppo").children("input[name='data']").val("");
	$(document).on("click",id,function() {
	if(who==="Employer")
	{
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
		if(isEmail(email1)&&isNomeCompagnia(nomeCompagnia)&&isVia(via)&&isDescrizione(descrizione1))
		{
			if(document.URL.includes("/registrazione")&&isPassword(password1)&&isCaptcha())
			{
				$.post("/registrazioneEmployer",{
					name:nomeCompagnia,
					address:via,
					description:descrizione1,
					email:email1,
					password:password1,
				  }).done((mess)=>{
					  if(mess==="1")
					  {
						  window.location.href = "/login";
					  }
					  else{
						  alert("Email già presente");
					  }
				  });
			}
			if(document.URL.includes("/profile"))
			{
				$.post("/employer/"+email+"/edit",{
					name:nomeCompagnia,
					address:via,
					description:descrizione1,
				  }).done((mess)=>{
					if(mess==="1")
					{
						location.reload();
					}
					else{
						alert("Qualcosa è andato storto, riprova!");
					}
				  });
			}
		}
	}
	});
}

function checkStudent(id) {
	
	$(id).parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$(id).parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password deve avere tra i 6 ed i 20 caratteri, contenere almento una lettera maiuscola, almeno una lettera minuscola ed almeno un numero. NON sono concessi caratteri speciali");
	$(id).parent().children(".gruppo").children("input[name='nome']").get(0).setCustomValidity("Il nome deve avere dai 3 ai 20 caratteri");
	$(id).parent().children(".gruppo").children("input[name='cognome']").get(0).setCustomValidity("Il cognome deve avere dai 3 ai 30 caratteri");
	$(id).parent().children(".gruppo").children("input[name='data']").get(0).setCustomValidity("La data è obbligatoria");
	$(id).parent().children(".gruppo").children("select").get(0).setCustomValidity("Seleziona almeno una categoria");
	$(document).on("click",id,function() {
		if(who==="Student")
	{
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
		if(isEmail(email)&&isNome(nome)&&isCognome(cognome)&&isData(data)&&$("#categoria").val().length !== 0)
		{
			if(document.URL.includes("/registrazione")&&isCaptcha()&&isPassword(password))
			{
				$.post("/registrazioneStudent",
				{
				  name:nome,
				  surname:cognome,
				  birth_date:data,
				  email:email,
				  password:password,
				  category:$("#categoria").val(),
				}).done((mess)=>{
					if(mess==="1")
					{
						window.location.href = "/login";
					}
					else{
						alert("Email già presente");
					}
				})
			}
				if(document.URL.includes("/profile"))
				{
					$.post("/student/"+email+"/edit",
					{
					  name:nome,
					  surname:cognome,
					  birth_date:data,
					  category:$("#categoria").val(),
					}).done((mess)=>{
						if(mess==="1")
						{
							location.reload();
						}
						else{
							alert("Qualcosa è andato storto, riprova!");
						}
					})
				}
			}
			else
			{
				console.log("errore");
			}
		}
	});
}

function invioDati() {
	if (document.URL.includes("/login")) {
		invioDatiLogin();
	} else if (document.URL.includes("/registrazione")) {
		change();
		checkStudent("#invioDatiRegistrazione");
		checkAzienda("#invioDatiRegistrazione");
	} else if (document.URL.includes("/profile")) {
		logout();
		$(".gazienda label").css("top","-13px");
		$(".gutente label").css("top","-13px");
		$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='password']").parent().css("display","none");
		$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='password1']").parent().css("display","none");
		$(".gutente input[type=date]").css("color","#3c4043");
		$.get("/session").done((mess)=>{
			who=mess['type'];
			email=mess['email'];
			if (who === "Employer") {
				$('#ricercaTirocinio').css("display","none");
				$("#cosaDire").text("Elenco placement");
				$('.gazienda').removeClass("nascondi");
				$('.gutente').addClass("nascondi");
				checkAzienda("#invioDatiPrivato");
				invioDatiCreazioneTirocinio();
				$.get("/employer/"+mess['email']).done((mess1)=>{
				mess1=mess1[0];
				$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='email1']").val(mess1['email']);
				$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='password1']").val(mess1['password']);
				$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='nomeCompagnia']").val(mess1['name']);
				$('#invioDatiPrivato').parent().children(".gruppo").children("#searchBoxContainer").children("input[name='via']").val(mess1['address']);
				$('#invioDatiPrivato').parent().children(".gruppo").children("textarea[name='descrizione1']").val(mess1['description']);
			});
			caricaPlacement();
			caricaInformazioniPlacement()
			} else {
				$("#cosaDire").text("Elenco offerte");
				$("#aggiungiPlacement").css("display","none");
				$('.gazienda').addClass("nascondi");
				$('.gutente').removeClass("nascondi");
				checkStudent("#invioDatiPrivato");
				$.get("/student/"+mess['email']).done((mess1)=>{
					mess1=mess1[0];
					$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='email']").val(mess1['email']);
					$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='nome']").val(mess1['name']);
					$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='cognome']").val(mess1['surname']);
					$('#invioDatiPrivato').parent().children(".gruppo").children("input[name='data']").val(mess1['birth_date']);
					$.get("/student/"+mess['email']+"/category").done((mess3)=>{;
						for(let riga of mess3)
						{
							$("#categoria > option[value='" + riga['category_name'] + "']").prop("selected", true);
						}
						});
				});
			}
			startModifica(who);
			$(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
		});
	} else {
		console.log("errore");
	}
}

function invioDatiLogin() {
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password non può essere nulla");
	$(document).on("click","#invioDatiLogin",function() {
		let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
		let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
		if (!isEmail(email)) {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#1a73e8");
		}
		if (!isPasswordLogin(password)) {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#1a73e8");
		}
		if(isEmail(email)&&isPasswordLogin(password))
		{
			$.post("/loginCheck",
  			{
				email:email,
				password:password
  			}).done((mess)=>
			  {
				if(mess==="1")
				{
					window.location.href = "/profile";
				}
				else
				{
					alert("Ci dispiace, non sei registrato.");
				}
			  });
		}
	});
}

function invioDatiCreazioneTirocinio() {
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='titolo']").get(0).setCustomValidity("Il titolo deve avere da 1 a 40 caratteri");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='durata']").get(0).setCustomValidity("La durata è obbligatoria (es: 3 settimane)");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataInizio']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataFine']").get(0).setCustomValidity("La data è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("textarea[name='descrizione2']").get(0).setCustomValidity("La descrizione non è obbligatoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='salario']").get(0).setCustomValidity("Il salario non è obbligatorio");
	$("#invioDatiOfferta").parent().children(".gruppo").children("select").get(0).setCustomValidity("Seleziona almeno una categoria");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataFine']").val("");
	$("#invioDatiOfferta").parent().children(".gruppo").children("input[name='dataInizio']").val("");
	$(document).on("click","#invioDatiOfferta",function() {
		let titolo = $(this).parent().children(".gruppo").children("input[name='titolo']").val().trim().toLowerCase();
		let durata = $(this).parent().children(".gruppo").children("input[name='durata']").val().trim().toLowerCase();
		let dataInizio = $(this).parent().children(".gruppo").children("input[name='dataInizio']").val();
		let dataFine = $(this).parent().children(".gruppo").children("input[name='dataFine']").val();
		let descrizione2 = $(this).parent().children(".gruppo").children("textarea[name='descrizione2']").val().trim().toLowerCase();
		let salario = $(this).parent().children(".gruppo").children("input[name='salario']").val();
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

		if(isTitolo(titolo)&&isDurata(durata)&&isData(dataInizio)&&isData(dataFine)&&isDescrizione(descrizione2)&&isSalario(salario))
		{
			$.post("/employer/"+email+"/placement",{
				title:titolo,
				description:descrizione2,
				duration:durata,
				start_date:dataInizio,
				expiration_date:dataFine,
				salary:salario,
			  }).done((mess)=>{
				if(mess==="1")
				{
					location.reload();
				}
				else{
					alert("Qualcosa è andato storto, riprova!");
				}
			  });
		}
	});
}

function change() {
	if ($('#studente').is(':checked')) {
		$('.gazienda').addClass("nascondi");
		$('.gutente').removeClass("nascondi");
		who="Student";
	}
	if ($('#azienda').is(':checked')) {
		$('.gazienda').removeClass("nascondi");
		$('.gutente').addClass("nascondi");
		who="Employer";
	}
	$("input[type='radio']").change(function () {
		$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
		$(".gruppo>input[type=date]").val("");
		if ($('#studente').is(':checked')) {
			$('.gazienda').addClass("nascondi");
			$('.gutente').removeClass("nascondi");
			who="Student";
			$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
			$(".gruppo>input[type=date]").val("");
			$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").focusout();
			$(".gruppo>input[type=date]").focusout();

		}
		if ($('#azienda').is(':checked')) {
			$('.gazienda').removeClass("nascondi");
			$('.gutente').addClass("nascondi");
			who="Employer";
			$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").focusout();
			$(".gruppo>input[type=date]").focusout();
		}
	});
}

function startModifica(chi) {
	$("#invioDatiPrivato").css("display", "none");
	$(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
	$(document).on("click","#modificaPrivato",function() {
		if ($(this).text() === "Modifica") {
			if (chi === "Employer") {
				$(".gazienda").children().prop("disabled", false);
				$(".gutente").children("input[name='email1']").prop("disabled", true);
				$(".gazienda").children("#searchBoxContainer").children("input").prop("disabled", false);
				$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").focus();
				$(".gruppo>input[type=date]").focus();
			}
			if (chi === "Student") {
				$(".gutente").children("input").prop("disabled", false);
				$(".gutente").children("input[name='email']").prop("disabled", true);
				$(".gutente").children("select").prop("disabled", false);
				$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").focus();
				$(".gruppo>input[type=date]").focus();
			}
			$("#invioDatiPrivato").css("display", "block");
			$("#modificaPrivato").text("Annulla");
		} else {
			location.reload();
		}
		$(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
	});
}