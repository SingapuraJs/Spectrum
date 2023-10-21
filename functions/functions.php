<?php 
function isLogged(){
    if(isset($_SESSION['id'])){
         return TRUE;
    } else {
         header("location: ../index.php");
    }
}

function isNOTLogged(){
    if(!isset($_SESSION['id'])){
         return TRUE;
    } else {
         header("location: index.php");
    }
}

function logOut(){
    session_start();
    session_unset();
    session_destroy();
}

function getUserCredentials($pdo, $id){
     $sql = "SELECT usr_usuario, usr_email, usr_telefone FROM usuarios WHERE id_usuario = :id";
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
     $stmt->execute();
     return $stmt->fetch();
 }
 

?>