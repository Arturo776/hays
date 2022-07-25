// This file validates given login credentials.

// Import helpers.
import {validateUsername, validatePassword} from './helpers.js';

// Error variable to store errors.
// All set to true to hide Login buttons by default.
var errors = {username: true, password: true};

// Get button and inputs.
var button = document.getElementsByClassName("button-group")[0];
var username = document.getElementById("username");
var password = document.getElementById("password");

// Filter username.
username.addEventListener("focusout", (event) => errors = validateUsername(username, errors, button));

// Check password length.
password.addEventListener("focusout", (event) => errors = validatePassword(password, errors, button));