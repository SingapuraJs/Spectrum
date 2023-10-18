<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('../functions/functions.php');
    isLogged();

    include '../database.php';

    print_r(getUser($pdo, $_SESSION['id'])); 
    print_r(getEmail($pdo, $_SESSION['id'])); 
    print_r(getNumber($pdo, $_SESSION['id'])); 

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
    <div id="profile">
        <div id="ProfileImage"></div>
        <div id="ProfileAgenda"> </div>
        <div id="ProfileInfo"></div>
        <div id="EditDelete"></div>
    </div>

    
    
</body>
</html>
