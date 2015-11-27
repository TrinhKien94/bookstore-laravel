// JavaScript Document
$(document).ready(function(){
	var form = $("#contact_form");
	var name = $("#name");
	var nameDetails=$("#nameDetails");
	var email=$("#email");
	var emailDetails=$("#emailDetails");
	var pass1=$("#pass1");
	var pass2=$("#pass2");
	var pass1Details=$("#pass1Details");
	var pass2Details=$("#pass2Details");
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	name.keyup(validateName);
	email.keyup(validateEmail);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	form.submit(function(){
		if(validateName() & validateEmail() & validatePass1() &validatePass2()){
			return true;
		}else{ 
			return false;
		}
	});
	function validateName(){
		if(name.val().length <5){
			name.addClass("error");
			nameDetails.text("four name isn't that abort. Make it 5 character or more!");
			nameDetails.addClass("error");
			return false;
		}else{
			name.removeClass("error");
			nameDetails.text("OK");
			nameDetails.removeClass("error");
			return true;
		}
	}
	function validateEmail(){
		var emailVal =$("#email").val();
		var regexp = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if(regexp.test(emailVal)){
			email.removeClass("error");
			emailDetails.text("OK");
			emailDetails.removeClass("error");
			return true;
		}else{
			email.addClass("error");
			emailDetails.text("Enter a valid email address please.");
			emailDetails.addClass("error");
			return false;
		}	
	}
	function validatePass1(){
		if(pass1.val().length < 8){
			pass1.addClass("error");
			pass1Details.text("8 characters or more please.");
			pass1Details.addClass("error");
			return false;
		}else{
			pass1.removeClass("error");
			pass1Details.text("OK");
			pass1Details.removeClass("error");
			return true;
		}
	}
	function validatePass2(){
		if(pass2.val() !== pass1.val()){
			pass2.addClass("error");
			pass2Details.text("Passwords do not match!");
			pass2Details.addClass("error");
			return false;
		}else{
			pass2.removeClass("error");
			pass2Details.text("OK");
			pass2Details.removeClass("error");
			return true;
		}
	}
});