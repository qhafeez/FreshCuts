	//sign up form//
	$firstNameSign = $("#firstNameSign");
	$lastNameSign = $("#lastNameSign");
	$userName = $("#userNameSign");
	$signUpPass = $("#signUpPass");
	$confPass = $("#confPass");
	$submit = $('input[type="submit"]');

function firstAndLastNamesPresent(){
	return ($("#firstNameSign").val().length > 0 && $("#lastNameSign").val().length > 0);
}
function userNamePresent(){
	return $("#userNameSign").val().length > 0;
}
function passwordValid(){
	return $signUpPass.val().length > 8;
}
function confirmPassword(){
	return $signUpPass.val() === $confPass.val();
}
function passwordEvent(){
	if($signUpPass.val().length <=8){
		$(this).parent().addClass("has-error");
		$(this).next().show();
	} else {
		$(this).parent().removeClass("has-error");
		$(this).next().hide();
	}
}
function confirmPasswordEvent(){
	if($signUpPass.val() !== $confPass.val()){
		$confPass.parent().addClass("has-error");
		$confPass.next().show();
	} else{
		$confPass.parent().removeClass("has-error");
		$confPass.next().hide();
	}
}
function canSubmit(){
	return (firstAndLastNamesPresent() && userNamePresent() && passwordValid() && confirmPassword());
}
function enableSubmitEvent(){
	$submit.prop("disabled", !canSubmit());
}
//log in form
$firstNameSign.keyup(enableSubmitEvent);
$lastNameSign.keyup(enableSubmitEvent);
$userName.keyup(enableSubmitEvent);
$signUpPass.keyup(passwordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);
$confPass.keyup(confirmPasswordEvent).keyup(enableSubmitEvent);