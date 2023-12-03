<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    echo "bbbb";
    require_once(__DIR__ . '/../../func/functions.php');
    isLogged();
    echo "bbbddb";

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";

    require_once __DIR__ . '/../../vendor/autoload.php';


    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Use barras invertidas

    $dotenv->load();
    


    require_once(__DIR__ . '/../../config/database.php');
    

    $userCredentials = getUserCredentials($pdo, $_SESSION['user']['id']);

    $username = $userCredentials[0];
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
                <img src="../assets/profile.png">
                <label id="card"><?= $username ?></label>
            </div>
        </div>

        
        <div id="ProfileInfo" class="preset">
            <div class="card" id="information" style="width: 85%";>
                <label>Usuario: 
                    <span"><?=$username?></span>
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


        <a href="edit.php" id="edit-btn">Editar</a>
        <a href="delete.php" id="delete-btn">Delete</a>
        
    </div>

    
    
</body>
</html>