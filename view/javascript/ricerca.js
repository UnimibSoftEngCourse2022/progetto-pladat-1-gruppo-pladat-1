$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	animazioneRicerca();
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