<?php

session_start();

if (isset($_SESSION["user"]) && $_SESSION["user"]) {
    header('Location: user_list.php');
    exit();
}

require __DIR__."/database/controller.php";

// Check whether the form has been sent or not.
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get inputs.
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $re_password = trim($_POST["re_password"]);
    $email = trim($_POST["email"]);

    if (strlen($username) == 0 || strlen($password) == 0 || strlen($re_password) == 0 || strlen($email) == 0) {
        header("Location: register.php");
        exit();
    }
    
    // Sanitize username input to prevent code injection.
    $clean_username = filter_var(strtolower($username), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Hash password.
    $hashed_password = hash("sha256", $password);
    $hashed_re_password = hash("sha256", $re_password);

    // Sanitize email.
    $clean_email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $clean_email = filter_var($clean_email, FILTER_SANITIZE_EMAIL);

    if ($hashed_password != $hashed_re_password) {
        header("Location: register.php");
        exit();
    }

    $registered = create($clean_username, $hashed_re_password, $clean_email);

    if ($registered) {
        header("Location: login.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Load Javascripts -->
    <script src="./javascript/smoothener.js" defer></script>
    <script type="module" src="./javascript/register.js" defer></script>
</head>
<body>

    <section class="body-wrapper">
        <header class="title-container">
            <h1>Regístrate en la web.</h1>
        </header>

        <!--
        Displays database status. 
        Green color means the database is enabled and red means there was an error. 
        -->
        <aside>
            <article class="alert database-enabled-<?= $database_enabled ?>" style="opacity: 100%;"></article>
        </aside>
    
        <main>
            <!-- Register formulary -->
            <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">

                <section class="input-group">
                    <label for="username">Nombre de usuario <span style="color: red;">*</span></label>
                    <input type="text" name="username" id="username">
                </section>

                <section class="input-group">
                    <label for="password">Contraseña <span style="color: red;">*</span></label>
                    <input type="password" name="password" id="password">
                </section>

                <section class="input-group">
                    <label for="re_password">Repetir contraseña <span style="color: red;">*</span></label>
                    <input type="password" name="re_password" id="re_password">
                </section>

                <section class="input-group">
                    <label for="email">Email <span style="color: red;">*</span></label>
                    <input type="email" name="email" id="email">
                </section>

                <section class="form-banner">
                    <p>Rellena los campos</p>
                </section>

                <section class="button-group hidden">
                    <button type="submit" id="register">Registrarse</button>
                </section>

                <section class="redirect">
                    <a href="login.php">o entra</a>
                </section>

            </form>
        </main>

        <footer></footer>
    </section>

</body>
</html>