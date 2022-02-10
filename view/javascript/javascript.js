$(document).ready(function () {
	setInterval(myfunct, 2000);
	$( ".elenco-privato" ).css('min-height', $( "#iscrizione" ).parent().height()+"px");
	blurr();
	$(".gruppo>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	$(".gruppo>input").attr("");
})
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

function blurr()
{
	$(".gruppo > input[type=date]").focus(function()
	{
		$(this).css("color","#3c4043");
	});
	$(".gruppo > input").focus(function()
	{
		$(this).parent().addClass("gruppo-evidenziato");
	});
	$(".gruppo > input").focusout(function()
	{
		if($(this).val().trim()==="")
		{
			$(this).parent().removeClass("gruppo-evidenziato");
			$(this).val("");
		}
	});
	$(".gruppo > label").click(function()
	{
		$(this).parent().addClass("gruppo-evidenziato");
		$(this).parent().children("input").focus();
	});
}
let requestOptions = {
	method: 'GET',
  };

fetch("https://api.geoapify.com/v1/geocode/autocomplete?text=Mosco&apiKey=YOUR_API_KEY", requestOptions)
.then(response => response.json())
.then(result => console.log(result))
.catch(error => console.log('error', error));