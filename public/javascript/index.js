$(document).ready(function () {
	setInterval(myfunct, 2000);
})

let count = 1;

function myfunct() {
	if (count == 0) {
		$("#motivatore").html("Semplice");
	} else if (count == 1) {
		$("#motivatore").html("Professionale");
	} else {
		$("#motivatore").html("Adatto a te");
	}
	count++;
	count = count % 3;
	$("#motivatore").removeClass("fadeIn");
	$("#motivatore").width();
	$("#motivatore").addClass("fadeIn");
} 