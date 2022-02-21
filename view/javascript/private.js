$(document).ready(function () {
	infoOfferte();
	riempiCategoria();
	$(".gruppo").children().prop("disabled", true);
	sceltaAccetazione();
})

$(window).on('resize', function () {
	$(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
});

let listaCat = ["prima", "seconda", "terza", "quarta"];

function riempiCategoria() {
	for (let row of listaCat) {
		$("#categoria").append("<option value=" + row + ">" + row + "</option>");
		$("#categoria1").append("<option value=" + row + ">" + row + "</option>");
	}
}

function infoOfferte() {
	let ilMioHtml = "";
	$(".privato-placement").hover(
		function () {
			ilMioHtml = $(this).html();
			$(this).html("<p data-bs-toggle='modal' data-bs-target='#informazioni'>Informazioni</p><p data-bs-toggle='modal' data-bs-target='#applicanti'>Applicanti</p>");
		},
		function () {
			$(this).html(ilMioHtml);
		});
	$(".bloccoelencoapplicanti").hover(
		function () {
			$(this).children().eq(1).removeClass("nascondi");
		},
		function () {
			$(this).children().eq(1).addClass("nascondi");
		});
}

function sceltaAccetazione() {
	$(".sceltaAccettazione").click(function () {
		if ($(this).text().charCodeAt(0) == "10140") {
			$(this).html("✔");
			$(this).removeClass("attendo");
			$(this).addClass("accetto");
		} else if ($(this).text().charCodeAt(0) == "10004") {
			$(this).html("✖");
			$(this).removeClass("accetto");
			$(this).addClass("rifiuto");
		} else if ($(this).text().charCodeAt(0) == "10006") {
			$(this).html("✔");
			$(this).removeClass("rifiuto");
			$(this).addClass("accetto");
		}

	})
}