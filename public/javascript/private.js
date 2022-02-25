$(document).ready(function () {
	infoOfferte();
	riempiCategoria();
	$(".gazienda").children().prop("disabled", true);
	$(".utente").children().prop("disabled", true);
})

$(window).on('resize', function () {
	$(".elenco-privato").css('height', ($("#modifica").height() + 43.2) + "px");
});

function riempiCategoria() {
	$.get("/getCategory").done((lista)=>{
		for (let row of lista) {
				$("#categoria").append("<option value='" + row.name + "'>" + row.name + "</option>");
				$("#categoria1").append("<option value='" + row.name + "'>" + row.name + "</option>");
		} 
	})
}

function infoOfferte() {
	let ilMioHtml = "";
	$(document).on("mouseenter", ".privato-placement", function () {
			ilMioHtml = $(this).html();
			$(this).html("<p data-bs-toggle='modal' data-bs-target='#informazioni'>Informazioni</p><p data-bs-toggle='modal' data-bs-target='#applicanti'>Applicanti</p>");
		});
	$(document).on("mouseleave", ".privato-placement", function () {
			$(this).html(ilMioHtml);
	});
	$(document).on("mouseenter", ".bloccoelencoapplicanti", function () {
			$(this).children().eq(1).removeClass("nascondi");
		});
	$(document).on("mouseleave", ".bloccoelencoapplicanti", function () {
		$(this).children().eq(1).addClass("nascondi");
	});
}