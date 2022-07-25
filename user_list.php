<?php

session_start();

require __DIR__."/database/controller.php";

// Allows logged users only.
if (!isset($_SESSION["user"]) || !$_SESSION["user"]) {
    header('Location: login.php');
    exit();
} 

$users = index();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenid@!</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Load Javascript -->
    <script src="./javascript/table.js" defer></script>
    <script src="./javascript/smoothener.js" defer></script>
</head>
<body>

    <section class="body-wrapper">
        <header class="title-container">
            <h1>¡Bienvenid@!</h1>
        </header>
    
        <main>
            <section>
                <?php if ($users != false): ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de usuario</th>
                            <th>Contraseña</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user["id"] ?></td>
                            <td><?= $user["username"] ?></td>
                            <td data-password="true"><?= $user["password"] ?></td>
                            <td><?= $user["email"] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?php else: ?>

                <p>No se pueden mostrar los usuarios. Por favor, inténtelo más tarde.</p>

                <?php endif; ?>
            </section>

            <section class="logout-container">
                <a href="logout.php">Salir</a>
            </section>
        </main>

        <footer></footer>
    </section>

</body>
</html>