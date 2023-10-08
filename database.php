<?php 

// -----------ESTABELECENDO CONEXÃO COM O BANCO DE DADOS-----------------------------

$server = "localhost";
$user = "root";
$pass = "";
$db = "site_db";

$link = mysqli_connect($server, $user, $pass, $db);
