// Set an interval to create a background animation.

// Background circles.
var left = document.getElementById("circle-left");
var right = document.getElementById("circle-right");

var animation = setInterval(function() {

    // Update left circle position.
    var p = left.offsetLeft;
    left.style.left = `${p + 0.5}px`;

    // Update right circle position.
    p = right.offsetLeft;
    right.style.left = `${p - 1}px`;

}, 30);