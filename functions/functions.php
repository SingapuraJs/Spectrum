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

function checkCredentials($pdo, $user, $email){
     $sql = "SELECT 1 FROM usuarios WHERE usr_usuario = :user OR usr_email = :email;";
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(':user', $user, PDO::PARAM_STR);
     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     $stmt->execute();

     if($stmt->fetch()){
     
          return false;
     
     } 
     
     return true;
}

function getUserCredentials($pdo, $id){
     $sql = "SELECT usr_usuario, usr_email, usr_telefone, usr_senha FROM usuarios WHERE id_usuario = :id";
     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
     $stmt->execute();
     return $stmt->fetch();
 }
 

?>