<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('../functions/functions.php');
    isLogged();

    require_once('../database.php');
    

    $userCredentials = getUserCredentials($pdo, $_SESSION['id']);

    $user = $userCredentials[0];
    $email = $userCredentials[1];
    $number = $userCredentials[2] ? $userCredentials[2] : "Ainda não cadastrado";
    

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <a href="../index.php" style="background-color: red; text-decoration: none; width:fit-content;">voltar</a>

    <div id="profile">

        <div id="ProfileImage" class="preset"> 
            <div class="card">
                <img src="../image/profile.png">
                <label id="card"><?= $user ?></label>
            </div>
        </div>

        
        <div id="ProfileInfo" class="preset">
            <div class="card" id="information" style="width: 85%";>
                <label>Usuario: 
                    <span"><?=$user?></span>
                </label>

                <label>Email: 
                    <span><?=$email?></span>
                </label>

                <label>Senha: 
                    <span>*************</span>
                </label>
            
                <label>Telefone: 
                    
                <span><?= $number; ?></span></label>
            </div>


        </div>


        <div id="ProfileAgenda" class="preset"> </div>
        <a href="#" id="EditDelete">Editar</a>
        <a href="#" id="EditDelete">Delete</a>
        
    </div>

    
    
</body>
</html>
