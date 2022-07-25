// Displays a floating banner showing the status of the database connection. 

var database_alert = document.getElementsByClassName("alert")[0];

if (database_alert.classList.contains("database-enabled-1")) {
    database_alert.innerHTML = "Database enabled.";
}
else if (database_alert.classList.contains("database-enabled-0")) {
    database_alert.innerHTML = "Database not found.";
}

function hideDatabaseAlert() {
    database_alert.style.opacity = "0%";
}

setTimeout(function() { hideDatabaseAlert() }, 2000);