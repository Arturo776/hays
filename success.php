<?php

// Get URI components.
$host = $_SERVER["HTTP_HOST"];
$uri = $_SERVER["REQUEST_URI"];

// This code allows correct execution in XAMPP Apache server and PHP default server.
$path = preg_match("/\/\w+\//", $uri, $matches);

$url = ($path) ? "http://$host".$matches[0]."login.php" : "http://$host/login.php";

if (!isset($_SERVER["HTTP_REFERER"]) || $_SERVER["HTTP_REFERER"] != $url) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Éxito!</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Load Javascripts -->
    <script src="./javascript/smoothener.js" defer></script>
    <script src="./javascript/redirect.js" defer></script>
    <script src="./javascript/background.js" defer></script>
    <!-- Custom styles -->
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>

    <section class="body-wrapper">
        <main>
            <section class="container">
                <h1>¡Entraste con éxito!</h1>
            </section>
        </main>

        <footer></footer>
    </section>

    <!-- Background elements. -->
    <div class="circle circle-left light-blue" id="circle-left"></div>
    <div class="circle circle-right light-coral" id="circle-right"></div>

</body>
</html>