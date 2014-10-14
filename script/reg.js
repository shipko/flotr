var iName = $("#inputName"),
	cName = $("#controlName"),
	iSurname = $("#inputSurname"),
	cSurname = $("#controlSurname"),
	err = [true,true,true,true,true];

$('#inputName').blur(function() {
	if (iName.val() != '') {
		cName.removeClass("error").addClass("success");
		iName.next("span").hide().text("Отличное имя").fadeIn(400);
		err[0]=false;
	}
	else {
		cName.removeClass("success").addClass("error");
		iName.next("span").hide().text("Введите ваше имя").fadeIn(400);
		err[0]=true;
	}
});
$('#inputSurname').blur(function() {
	if (iSurname.val() != '') {
		cSurname.removeClass("error").addClass("success");
		iSurname.next("span").hide().text("Отличная фамилия").fadeIn(400);
		err[1]=false;
	}
	else {
		cSurname.removeClass("success").addClass("error");
		iSurname.next("span").hide().text("Введите вашу фамилию").fadeIn(400);
		err[1]=true;
	}
});
$('#inputPassword').blur(function() {
	err[2]=true;
	if ($("#inputPassword").val() == '') {
		$("#controlPassword").removeClass("success").addClass("error");
		$("#inputPassword").next("span").hide().text("Пароль не может быть пустым").fadeIn(400);	
	}
	else if($("#inputPassword").val().length < 6) {
			$("#controlPassword").removeClass("success").addClass("error");
			$("#inputPassword").next("span").hide().text("6 знаков или больше! Будьте хитрее.").fadeIn(400);
	} else {
		$("#controlPassword").removeClass("error").addClass("success");
		$("#inputPassword").next("span").hide().text("Ок").fadeIn(400);		
		err[2]=false;
	}
});
$('#inputEmail').blur(function() {
	err[3]=true;
	if ($("#inputEmail").val() != '') {
		email =  $("#inputEmail").val();
		var expEmail = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
		var resEmail =  email.search(expEmail);
		if(resEmail ==  -1){
			$("#inputEmail").next("span").hide().text("Не правильно введен email адрес").fadeIn(400);
			$("#controlEmail").addClass("error");
			buttonOnAndOff();
		}else{
			$("#controlEmail").removeClass("error").removeClass('success').addClass("info");
			$("#inputEmail").next("span").hide().text("Проверяем").fadeIn(400);
			$.ajax({
				url:  "signup.php?act=ajax&cat=mail",
				type:  "POST",
				data:  ({'mail' : $("#inputEmail").val()}),
				cache:  false,
				success:  function(response){
					if(response  != "no"){
						$("#controlEmail").removeClass("success").removeClass('info').addClass("success");
						$("#inputEmail").next().text("Ок");
						err[3]=false;
					}else{
						$("#inputEmail").next("span").hide().text("Такой email уже зарегистрирован").fadeIn(400);
						$("#controlEmail").removeClass("success").removeClass('info').addClass("error");
					}                                             
				}
			});																			
		}
	}
	else {
		$("#controlEmail").removeClass("success").addClass("error");
		$("#inputEmail").next("span").hide().text("Укажите адрес электронной почты").fadeIn(400);
	}
});
$('#inputLogin').blur(function() {
	err[4]=true;
	if ($("#inputLogin").val() != '') {
		$("#controlLogin").removeClass("error").removeClass("success").addClass("info");
		$("#inputLogin").next().text("Проверка").fadeIn(400);
		$.ajax({
			url:  "signup.php?act=ajax&cat=login",
			type:  "POST",
			data:  ({'login' : $("#inputLogin").val()}),
			cache:  false,
			async: true,
			success:  function(response){
				if(response  == "no"){
					$("#controlLogin").removeClass("success").removeClass("info");
					$("#inputLogin").next("span").hide().text("Логин занят").fadeIn(400);
					$("#controlLogin").addClass("error");
					
				} else {
					$("#controlLogin").removeClass("error").removeClass("info").addClass("success");
					$("#inputLogin").next().text("Логин не занят");
					err[4]=false;
				}
			}
		});
	}
	else {
		$("#controlLogin").removeClass("success");
		$("#controlLogin").addClass("error");
		$("#inputLogin").next("span").hide().text("Введите ваш логин").fadeIn(400);
	}
});
$('#submitForm').submit(function() {
var reg = true;
	for(var i=0; i<err.length; i++)
		if (err[i]) 
			reg = false;
	
	if (!reg) {
		$('#submit').animate({"margin-left": "-=7px"},70);
		$('#submit').animate({"margin-left": "+=14px"},70);
		$('#submit').animate({"margin-left": "-=14px"},70);
		$('#submit').animate({"margin-left": "+=14px"},70);
		$('#submit').animate({"margin-left": "-=14px"},70);
		$('#submit').animate({"margin-left": "+=7px"},70);
		return false 
	}
});