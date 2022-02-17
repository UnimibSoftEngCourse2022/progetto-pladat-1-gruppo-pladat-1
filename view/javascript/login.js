$(document).ready(function () {
	$(".gruppo>input, .gruppo>textarea, .gruppo>div>input").val("");
	$(".gruppo>input[type=date]").val(new Date().toISOString().split('T')[0]);
	blurr();
	invioDati();
})

function blurr() {
	$(".gruppo > input[type=date]").focus(function () {
		$(this).css("color", "#3c4043");
	});
	$(".gruppo > input, .gruppo>textarea").focus(function () {
		$(this).parent().addClass("gruppo-evidenziato");
	});
	$(".gruppo > input, .gruppo>textarea").focusout(function () {
		if ($(this).val().trim() === "") {
			$(this).parent().removeClass("gruppo-evidenziato");
			$(this).val("");
		}
	});
	$(".gruppo > div>input").focus(function () {
		$(this).parent().parent().addClass("gruppo-evidenziato");
	});
	$(".gruppo > div>input").focusout(function () {
		if ($(this).val().trim() === "") {
			$(this).parent().parent().removeClass("gruppo-evidenziato");
			$(this).val("");
		}
	});
	$(".gruppo > label").click(function () {
		$(this).parent().addClass("gruppo-evidenziato");
		$(this).parent().children("input").focus();
	});
}

function isEmail(email) {
	let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function isPassword(password) {
	let regex = /^.{1,40}$/;
	return regex.test(password);
}

function invioDati() {
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='email']").get(0).setCustomValidity("L'email deve avere il formato corretto");
	$("#invioDatiLogin").parent().children(".gruppo").children("input[name='password']").get(0).setCustomValidity("La password non può essere nulla");
	$("#invioDatiLogin").click(function () {
		let email = $(this).parent().children(".gruppo").children("input[name='email']").val().trim().toLowerCase();
		let password = $(this).parent().children(".gruppo").children("input[name='password']").val().trim();
		if (!isEmail(email)) {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='email']").css("border-color", "#1a73e8");
		}
		if (!isPassword(password)) {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#ea4335");
		} else {
			$(this).parent().children(".gruppo").children("input[name='password']").css("border-color", "#1a73e8");
		}
	});
}