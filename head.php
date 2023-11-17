<?php
if (!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <header>

        <div id="menu">

            <div id="infoHome">
                <a href="?pagina=info" id="info">INFO</a>
                <a href="./index.php" id="home">Inicio</a>
            </div>

        <img src="./assets/logo.png" alt="">

        <div id="CadLogin">

            <?php if (!isset($_SESSION['id'])) : ?>
                
                <a href="?pagina=login" id="login">LOGIN</a>
                <a href="?pagina=register" id="Registro">REGISTRO</a>

            <?php else : ?>

                <a href="./profilePage/logout.php" id="logout">Logout</a>
                <a href="./profilePage/profile.php" id="perfil">Meu perfil</a>

            <?php endif; ?>

        </div>

    </header>