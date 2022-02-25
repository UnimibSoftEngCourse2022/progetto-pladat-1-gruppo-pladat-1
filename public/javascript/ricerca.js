$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	riempiCategoria()
	animazioneRicerca();
	caricaRicerca();
	elencoOfferte();
	caricaInformazioniPlacement();
	inviaDati();
	getEmail();
})

let chiVoglio="";
let email="";

function getEmail()
{
	$.get("/session").done((mess)=>{
		email=mess['email'];
	});
}

function animazioneRicerca() {
	const chi = document.getElementById('scrittaRicerconaAuto');
	let istanza = new TypeIt(chi, {
		strings: "Ricerca il tirocinio adatto a te",
		speed: 100,
		startDelay: 1000,
		loop: true,
		loopDelay: 5000,
	}).go();
	$(document).on("focus", "#ricercona", function () {
		istanza.freeze();
		$('#scrittaRicerconaAuto').addClass("nascondi");
	})
	$(document).on("focusout", "#ricercona", function () {
		if ($("#ricercona").val().trim() === "") {
			istanza.unfreeze()
			$('#scrittaRicerconaAuto').removeClass("nascondi");
		}
	})
}
let lista = [];
function riempiCategoria() {
	$.get("/getCategory").done((lis)=>{
		for (let row of lis) {
			lista.push(row['name']);
		}
	});
}

function inviaDati()
{
	$( "#inviaMiPresento" ).on("click", function(e) {
		e.preventDefault();
		let files = $( ".applicazione  input")[0].files;
		let formData = new FormData();
		if(files.length > 0 ){
			formData.append("curriculum", files[0]);
			formData.append("presentation_letter", $( ".applicazione  textarea" ).val());
			formData.append("idPlacement", chiVoglio);
			formData.append("student_email",email)
			$.ajax({
				url: "/student/"+email+"/request",
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function( response ) {
					if( response === "1" ) {
						alert("La procedura è andata a buon fine! In bocca al lupo!")
						location.reload();
					}
					else {
						alert("C'è stato un errore. Ti ricordiamo che non è possibile applicare due volte per la stessa offerta purtroppo. Nel caso contatta l'azienda via email e buona fortuna!")
					}
				}
			});
		}
	});
}

function caricaInformazioniPlacement()
{
		$(document).on("click",".ilPlacement > p:nth-child(2)",function() {
			chiVoglio=$(this).parent().attr('id');
		});

		$(document).on("click",".ilPlacement > p:nth-child(1)",function() {
			$.get("/placement/"+$(this).parent().attr('id')+"/byid").done((mess)=>{
				mess=mess[0];
				$(".tirocinio >p> .mCompagnia").text(mess['name']);
				$(".tirocinio >p> .mEmail").text(mess['email']);
				$(".tirocinio >p> .mTitolo").text(mess['title']);
				$(".tirocinio >p> .mStipendio").text(mess['salary']);
				$(".tirocinio >p> .mDurata").text(mess['duration']);
				$(".tirocinio >p> .mInizio").text(mess['start_date']);
				$(".tirocinio >p> .mFine").text(mess['expiration_date']);
				$(".tirocinio .mDescription").text(mess['description']);
			})
		})
}
function caricaPlacementCategoria()
{
	if(lista.includes($('#ricercona').val().trim()))
	{
		let tmp="";
		$.get("/placement/"+$('#ricercona').val().trim()).done((mess1)=>{
			if(mess1!==0)
			{
				for(let row of mess1)
				{
					tmp="<div class='ilPlacement' id='"+row['idPlacement']+"'><p>"+row['title']+"</p><p>"+row['idCategory']+"</p><p>"+row['name']+"</p></div>";
					$(".elencoOfferte").append(tmp);
				}
			}
			else {
				$(".elencoOfferte").append(tmp);
			}
		});
	}
}
function caricaRicerca() {
	$('#elencoRicerca').css("display", "none");
	$(document).on("focus", "#ricercona", function () {
		$('#elencoRicerca').css("display", "block");
		$('#ricercona').css("border-top", "2px solid #f2f2f2");
		$('#ricercona').css("border-left", "2px solid #f2f2f2");
		$('#ricercona').css("border-right", "2px solid #f2f2f2");
		$('#ricercona').css("border-bottom", "0");
	})
	$(document).on("focusout", "#ricercona", function () {
		$('#elencoRicerca').css("display", "none");
		$('#ricercona').css("border-top", "0");
		$('#ricercona').css("border-left", "0");
		$('#ricercona').css("border-right", "0");
		if ($('#ricercona').val().trim() !== "") {
			$('#ricercona').css("border-bottom", "2px solid #1a73e8");
		} else {
			$('#ricercona').css("border-bottom", "2px solid #f2f2f2");
		}
	})
	$('#elencoRicerca').hover(function () {
		$('#ricercona').focus();
	}); 
	for (let row of lista) {
		$('#elencoRicerca').append("<li onclick='scriviricerca(this)'>" + row + "</li>");
	}
	$("#ricercona").keyup(function () {
		$('#elencoRicerca').text("");
		for (let row of lista) {
			if (row.toUpperCase().indexOf($("#ricercona").val().toUpperCase()) > -1) {
				$('#elencoRicerca').append("<li onclick='scriviricerca(this)'>" + row + "</li>");
			}
		}
	});
}

function elencoOfferte() {
	let ilMioHtml = "";
	$(document).on("mouseenter", ".elencoOfferte>div", function () {
			ilMioHtml = $(this).html();
			$(this).html("<p data-bs-toggle='modal' data-bs-target='#informazioni'>Informazioni</p><p data-bs-toggle='modal' data-bs-target='#applica'>Applica</p>");
		});
	$(document).on("mouseleave", ".elencoOfferte>div", function () {
			$(this).html(ilMioHtml);
		})
}

function scriviricerca(event) {
	document.getElementById('ricercona').value = event.innerHTML;
	caricaPlacementCategoria();
}