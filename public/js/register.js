"use strict";
$('#register-form').submit(function()
{
	var username = $("#register-username").val();
	var email = $("#register-email").val();
	var password = $("#register-password").val();
	var cpassword = $("#register-cpassword").val();
	var fname = $("#register-fname").val();
	var lname = $("#register-lname").val();
    if (username === "") { 
        // show error
        alert("Plese enter an username.");
        return false; 
    }
    if (email === "") { 
        // show error
        alert("Please enter an email.");
        return false; 
    }
    if (password === "") { 
        // show error
        alert("Please enter a password.");
        return false; 
    }
    if (cpassword === "") { 
        // show error
        alert("Please re-enter password.");
        return false; 
    }
    if (fname === "") { 
        // show error
        alert("Please enter your first name.");
        return false; 
    }
    if (lname === "") { 
        // show error
        alert("Please enter your lastname.");
        return false;
    }
    if (password !== cpassword) { 
        // show error
        alert("Passwords do not match.");
        return false; 
    }
});