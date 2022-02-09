$(document).ready(function () {
	setInterval(myfunct, 2000);
});
let count = 1;

function myfunct() {
	if (count == 0) {
		$("#motivatore").html("Semplice");
	} else if (count == 1) {
		$("#motivatore").html("Porfessionale");
	} else {
		$("#motivatore").html("Adatto a te");
	}
	count++;
	count = count % 3;
	$("#motivatore").removeClass("fadeIn");
	$("#motivatore").width();
	$("#motivatore").addClass("fadeIn");
}
function formeffect(id, para) {
	var oggetto = document.getElementById(id);
	oggetto.style = "font-size: 13px; top:-13px; color:#1a73e8";
	document.getElementById(para).placeholder = "Scrivi qui...";
	document.getElementById(para).focus();
}
function formeffect2(id,para) {
	var label=document.getElementById(id);
	var input=document.getElementById(para);
	var valore=input.value.trim();
	if(valore.length === 0)
	{
		document.getElementById(para).placeholder = "";
		label.style = "font-size: 15px; top:5px;";
	}
		input.value=valore;
}
