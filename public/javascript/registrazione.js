$(document).ready(function () {
	scrittura();
	riempiCategoria();
})

let listaCat = ["prima", "seconda", "terza", "quarta"];

function riempiCategoria() {
	$.get("/getCategory").done((lista)=>{
		for (let row of lista) {
				$("#categoria").append("<option value='" + row.name + "'>" + row.name + "</option>");
		} 
	})
}

function scrittura() {
	$('.invito').typeIt({
		speed: 100,
		startDelay: 1000,
		loop: true,
		loopDelay: 5000,
	}).tiType("Registrati ora! È semplice!")
}