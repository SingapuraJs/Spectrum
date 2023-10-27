<?php
require_once('./functions/functions.php');
require_once('database.php');

if(!isset($_SESSION)){
    session_start();
} 

if(isNOTLogged()){
    if(isset($_POST['usuario'])){
        
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usr_usuario = :usuario"; // 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        $retorno = $stmt->fetch();
        if ($retorno) {
            if (password_verify($senha, $retorno['usr_senha'])) { // login realizado
                $_SESSION['id'] = $retorno['id_usuario'];
                header("location: index.php");
            } else {
                echo "Usuário ou senha incorretos";
            }
        } else {
            echo "Usuário não encontrado";
        }
        

    }

}
?>


<div id="formLogin" class="content">
    <form action="" method="POST">

        <label for="usuario">Usuario:
        <input type="text" name="usuario" required><br>
        </label>

        <label for="senha">Senha:
        <input type="password" name="senha" required><br>
        </label>
        
        <button type="submit">entrar</button>
    </form>
</div>

