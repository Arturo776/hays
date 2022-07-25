// This scripts makes the password in user_list.php shorter.

var rows = document.querySelectorAll('[data-password]');
rows.forEach(function(r) {
    var pw = r.innerHTML;
    r.innerHTML = pw.substring(0, 20) + '...';
});