
function formhash(form, passkey) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");

    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(passkey.value);

    // Make sure the plaintext password doesn't get sent. 
    passkey.value = "";

    // Finally submit the form. 
    form.submit();
}

function regformhash(form, player, handle, confirm, passkey, birthday, birthmonth, birthyear) {
    // Check each field has a value
    if (player.value == '' || handle.value == '' || confirm.value == '' || passkey.value == '' || birthday.value == '' || birthmonth.value == '' || birthyear.value == '') {
        alert('You must provide all the requested details. Please try again');
        return false;
    }
    
    // Check the username
    re = /^\w+$/; 
    if(!re.test(form.player.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.player.focus();
        return false; 
    }
    
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (passkey.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.passkey.focus();
        return false;
    }
    
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(passkey.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
    
    // Check password and confirmation are the same
    // if (password.value != conf.value) {
    //     alert('Your password and confirmation do not match. Please try again');
    //     form.password.focus();
    //     return false;
    // }
        
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");

    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(passkey.value);

    // Make sure the plaintext password doesn't get sent. 
    passkey.value = "";
    // conf.value = "";

    // Finally submit the form. 
    form.submit();
    return true;
}
