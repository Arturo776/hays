<?php

http_response_code(404);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ha habido un error.</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Load Javascripts -->
    <script src="./javascript/smoothener.js" defer></script>
    <script src="./javascript/404.js" defer></script>
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
                <h1>¡Esta página no existe!</h1>
            </section>
        </main>

        <footer></footer>
    </section>

    <!-- Background elements. -->
    <div class="circle circle-left light-blue" id="circle-left"></div>
    <div class="circle circle-right light-coral" id="circle-right"></div>

</body>
</html>