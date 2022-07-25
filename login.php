<?php

session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]) {
    header('Location: user_list.php');
    exit();
}

require_once __DIR__."/database/setup.php";
require __DIR__."/database/controller.php";

// Check whether the form has been sent or not.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get inputs.
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    // Sanitize username input to prevent code injection.
    $clean_username = filter_var(strtolower($username), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Hash password.
    $hashed_password = hash("sha256", $password);

    // Check if login credentials match with any register in the database.
    $logged = read($clean_username, $hashed_password);

    $_SESSION["user"] = (is_array($logged)) ? true : false;

    if ($_SESSION["user"]) {
        header('Location: success.php');
        exit();
    }
    else {
        header('Location: error.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Load Javascripts -->
    <script src="./javascript/smoothener.js" defer></script>
    <script src="./javascript/database.js" defer></script>
    <script type="module" src="./javascript/login.js" defer></script>
</head>
<body>

    <section class="body-wrapper">
        <header class="title-container">
            <h1>Accede a la web.</h1>
        </header>

        <!--
        Displays database status. 
        Green color means the database is enabled and red means there was an error. 
        -->
        <aside>
            <article class="alert database-enabled-<?= $database_enabled ?>" style="opacity: 100%;"></article>
        </aside>
    
        <main>

            <!-- Login formulary -->
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

                <section class="input-group">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" name="username" id="username">
                </section>

                <section class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </section>

                <section class="form-banner">
                    <p>Rellena los campos</p>
                </section>

                <section class="button-group hidden">
                    <button type="submit" id="login">Entrar</button>
                </section>

                <section class="redirect">
                    <a href="register.php">o regístrate</a>
                </section>

            </form>
        </main>

        <footer></footer>
    </section>

</body>
</html>