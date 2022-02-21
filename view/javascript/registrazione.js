$(document).ready(function () {
	scrittura();
	riempiCategoria();
})

let listaCat = ["prima", "seconda", "terza", "quarta"];

function riempiCategoria() {
	for (let row of listaCat) {
		$("#categoria").append("<option value=" + row + ">" + row + "</option>");
	} 
}

function scrittura() {
	$('.invito').typeIt({
		speed: 100,
		startDelay: 1000,
		loop: true,
		loopDelay: 5000,
	}).tiType("Registrati ora! È semplice!")
}