$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	animazioneRicerca();
	caricaRicerca();
	elencoOfferte();
})

function animazioneRicerca()
{
	const chi = document.getElementById('scrittaRicerconaAuto');
	let istanza=new TypeIt(chi, {
		strings: "Ricerca il tirocinio adatto a te",
		speed: 100,
  		startDelay: 1000,
		loop:true,
		loopDelay:5000,
	  }).go();
	$("#ricercona").focus(function() {
		istanza.freeze();
		$('#scrittaRicerconaAuto').addClass("nascondi");
	})
	$("#ricercona").focusout(function() {
		if($("#ricercona").val().trim()==="")
		{
			istanza.unfreeze()
			$('#scrittaRicerconaAuto').removeClass("nascondi");
		}
	})
}
let lista=["ciao","pippo"];
function caricaRicerca()
{
	$('#elencoRicerca').css("display","none");
	$('#ricercona').focus(function(){
		$('#elencoRicerca').css("display","block");
		$('#ricercona').css("border-top","2px solid #f2f2f2");
		$('#ricercona').css("border-left","2px solid #f2f2f2");
		$('#ricercona').css("border-right","2px solid #f2f2f2");
		$('#ricercona').css("border-bottom","0");
	})
	$('#ricercona').focusout(function(){
		$('#elencoRicerca').css("display","none");
		$('#ricercona').css("border-top","0");
		$('#ricercona').css("border-left","0");
		$('#ricercona').css("border-right","0");
		if($('#ricercona').val().trim()!=="")
		{
			$('#ricercona').css("border-bottom","2px solid #1a73e8");
		}
		else
		{
			$('#ricercona').css("border-bottom","2px solid #f2f2f2");
		}
	})
	$('#elencoRicerca').hover(function() {
		$('#ricercona').focus();
	});
	for (let i = 0; i < lista.length; i++) {
		$('#elencoRicerca').append("<li onclick='scriviricerca(this)'>"+lista[i]+"</li>");
	}
	$("#ricercona").keyup(function(){
		$('#elencoRicerca').text("");
		for (let i = 0; i < lista.length; i++) {
			if (lista[i].toUpperCase().indexOf($("#ricercona").val().toUpperCase()) > -1) {
				$('#elencoRicerca').append("<li onclick='scriviricerca(this)'>"+lista[i]+"</li>");
			}
		}
	});
}
function elencoOfferte()
{
	let ilMioHtml="";
	$(".elencoOfferte>div").mouseenter(function(){
		ilMioHtml=$(this).html();
		$(this).html("<p data-bs-toggle='modal' data-bs-target='#informazioni'>Informazioni</p><p data-bs-toggle='modal' data-bs-target='#applica'>Applica</p>");
	});
	$(".elencoOfferte>div").mouseleave(function(){
		$(this).html(ilMioHtml);
	});
}
function scriviricerca(event)
{
	document.getElementById('ricercona').value=event.innerHTML;
}