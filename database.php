<?php

// ----------- ESTABELECENDO CONEXÃO COM O BANCO DE DADOS ----------------------------

$server = "localhost";
$user = "root";
$pass = "";
$db = "site_db";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha: " . $e->getMessage());
}
