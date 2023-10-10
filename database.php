<?php 

// -----------ESTABELECENDO CONEXÃO COM O BANCO DE DADOS-----------------------------

$server = "localhost";
$user = "root";
$pass = "";
$db = "site_db";

$link = new mysqli($server, $user, $pass, $db);

if($link->connect_error){
    die("falha" . $link->connect_error);
}