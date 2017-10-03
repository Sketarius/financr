var register = {};
$(document).ready(function() {
	register.password1 = $('#password1');
	register.password2 = $('#password2');
	register.regbutton = $('#submit');

	register.checkPasswords = function () {
		if (register.password1.val().length > 0 && register.password2.val().length > 0) {
			if (register.password1.val() === register.password2.val()) {
				register.password2.removeClass('error_textfield');
				register.password2.addClass('success_textfield');				
				register.regbutton.prop("disabled", false);
			} else {
				register.password2.removeClass('success_textfield');
				register.password2.addClass('error_textfield');
				register.regbutton.attr('disabled', true);
			}
		} else {
			register.clearPasswordChecks();
			register.regbutton.attr('disabled', true);
		}
	}

	register.clearPasswordChecks = function() {
		register.password2.removeClass('error_textfield');
		register.password1.removeClass('success_textfield');
	}

	register.password1.keyup(function() {
		register.checkPasswords();
	});

	register.password2.keyup(function() {
		register.checkPasswords();
	});
});
/*
var password1_field = $('#password1');
var password2_field = $('#password2');

function checkPasswords() {
	if (password1_field.val().length > 0) {
		if (password1_field.val() === password2_field.val()) {
			password2_field.addClass('success_textfield');
		} else {
			password2_field.addClass('error_textfield');
		}
	}
}

password2.keyup(function() {
	checkPasswords();
});
*/