<?php
require_once('./functions/functions.php');

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


<div id="login" class="content">
    <form action="" method="POST">

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
    
        <button type="submit">entrar</button>
    </form>
</div>

