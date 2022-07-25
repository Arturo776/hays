// This file contains other functions necessary so the project runs perfectly. 

// Filters the given username to prevent code injection.
export function validateUsername(username, errors, button) {
    var is_illegal = /[^a-z0-9_]/gi.test(username.value);
    
    if (is_illegal == true || username.value.length == 0) {
        if (!username.classList.contains("input-error")) {
            username.classList.add("input-error");
        }

        // Add error.
        errors.username = true;

        // Hide button.
        if (!button.classList.contains("hidden")) {
            button.classList.add("hidden");
        }
    }
    else {
        if (username.classList.contains("input-error")) {
            username.classList.remove("input-error");
        }

        // Remove error.
        if ("username" in errors) {
            errors.username = false;
        }
    }

    return checkErrorList(errors, button);
}

// Validates password's length.
export function validatePassword(password, errors, button) {
    if (password.value.length < 8) {
        if (!password.classList.contains("input-error")) {
            password.classList.add("input-error");
        }

        // Add error.
        errors.password = true;

        // Hide button.
        if (!button.classList.contains("hidden")) {
            button.classList.add("hidden");
        }
    }
    else {
        if (password.classList.contains("input-error")) {
            password.classList.remove("input-error");
        }

        // Remove error.
        if ("password" in errors) {
            errors.password = false;
        }
    }

    return checkErrorList(errors, button);
}

// Check that both passwords are the same.
export function checkPasswords(password, re_password, errors, button) {
    if (password.value != re_password.value || re_password.value.length == 0) {
        if(!re_password.classList.contains("input-error")) {
            re_password.classList.add("input-error");
        }

        // Add error.
        errors.re_password = true;

        // Hide button.
        if (!button.classList.contains("hidden")) {
            button.classList.add("hidden");
        }
    }
    else {
        if (re_password.classList.contains("input-error")) {
            re_password.classList.remove("input-error");
        }

        // Remove error.
        if ("re_password" in errors) {
            errors.re_password = false;
        }
    }

    return checkErrorList(errors, button);
}

// Filters the given email.
export function validateEmail(email, errors, button) {
    // Return false if the email is valid. True if invalid.
    var is_illegal = /^[\w\d_]+@[\w\d_]+\.[\w]+$/gi.test(email.value) ? false : true;
    
    if (is_illegal == true || email.value.length == 0) {
        if (!email.classList.contains("input-error")) {
            email.classList.add("input-error");
        }

        // Add error.
        errors.email = true;

        // Hide button.
        if (!button.classList.contains("hidden")) {
            button.classList.add("hidden");
        }
    }
    else {
        if (email.classList.contains("input-error")) {
            email.classList.remove("input-error");
        }

        // Remove error.
        if ("email" in errors) {
            errors.email = false;
        }
    }

    return checkErrorList(errors, button);
}

// Check error list given.
function checkErrorList(errors, button) {
    var error_persist = false;

    // Set error_persist to true if any field is empty.
    // error_persist = inputs.map(function(input){ input.value.length === 0 });
    
    // Set error_persist to true if any error is found.
    Object.keys(errors).map((key, index) => {
        if (errors[key] === true) {
            error_persist = true;
        }
    });

    // Display button if there are no errors.
    if (error_persist === false) {
        if (button.classList.contains("hidden")) {
            button.classList.remove("hidden");
        }
        document.getElementsByClassName("form-banner")[0].classList.add("hidden");
    }
    else if (error_persist === true) {
        if (!button.classList.contains("hidden")) {
            button.classList.add("hidden");
        }
        document.getElementsByClassName("form-banner")[0].classList.remove("hidden");
    }

    return errors;
}