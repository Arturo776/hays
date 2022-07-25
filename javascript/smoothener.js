// This scripts makes HTML to load smoother.

// Get HTML content and set initial opacity to 0%.
var html = document.getElementsByTagName("body")[0];
html.style.opacity = 0;

var op = 0.1;
var smoothener_id = setInterval(function() {
    html.style.opacity = op;
    op += 0.1;

    if (html.style.opacity >= 1.0) {
        clearInterval(smoothener_id);
    }
}, 10);