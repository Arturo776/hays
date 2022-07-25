// This script redirects the user to user_list.php 2 seconds after successfully logged in.

// Redirect to the user list after 2 seconds.
var redirect_id = setTimeout(function() {
    var pathname = window.location.pathname;
    var path = /\/\w+\//g.exec(pathname);

    // var replace = (path) ? path + 'user_list.php' : '/user_list.php';
    
    window.history.back();
}, 2000);