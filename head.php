<?php 
    if(!isset($_SESSION))
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
            
            <a href="?pagina=info" id="info">INFO</a>
            <img src="./image/L02.png" alt="">
            
            <div id="CadLogin">
                
                    <a href="?pagina=info" id="info">INFO</a>
                    <a href="?pagina=home" id="home">Inicio</a>
                <div id="CadLogin">

                    <?php 
                        if(!isset($_SESSION['id'])){
                            echo '<a href="?pagina=login" id="login">LOGIN</a>';
                            echo '<a href="?pagina=cadastro" id="Registro">REGISTRO</a>';  
                        } else {
                            echo '<a href="./paginasProtect/logout.php" id="logout">Logout</a>';
                            echo '<a href="./paginasProtect/perfil.php" id="perfil">Meu perfil</a>';
                        }
                    ?>


                </div>
            </div>
    </header>