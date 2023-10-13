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
?>