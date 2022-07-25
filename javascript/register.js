// This file validates given login credentials.

// Import helpers.
import {validateUsername, validatePassword, checkPasswords, validateEmail} from './helpers.js';

// Error variable to store errors.
// All set to true to hide Register buttons by default.
var errors = {username: true, password: true, re_password: true, email: true};

// Get button and inputs.
var button = document.getElementsByClassName("button-group")[0];
var username = document.getElementById("username");
var password = document.getElementById("password");
var re_password = document.getElementById("re_password");
var email = document.getElementById("email");

// Validate username.
username.addEventListener("focusout", (event) => errors = validateUsername(username, errors, button));

// Check password length.
password.addEventListener("focusout", (event) => errors = validatePassword(password, errors, button));
re_password.addEventListener("focusout", (event) => errors = validatePassword(re_password, errors, button));

// Check password match.
re_password.addEventListener("focusout", (event) => errors = checkPasswords(password, re_password, errors, button));

// Validate email.
email.addEventListener("focusout", (event) => errors = validateEmail(email, errors, button));