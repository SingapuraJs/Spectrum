<?php
    include './database.php';

    if(!isset($_SESSION)){
        session_start();
    }
    require_once('./functions/functions.php');
    isNOTLogged();
    
    
?>

<div id="formCadastro" class="content">
<form action="" method="POST">
        <label for="usuario">Usuario: <input type="text" name="usuario" required></label>

        <label for="email">Email: <input type="email" name="email" required></label>

        <label for="senha">Senha: <input type="password" name="senha" required></label>

        <label for="telefone">Telefone: <input type="telephone" name="telefone"></label>

        <input type="submit" value="Cadastrar">
    </form>
        
</div> 

<?php 
        if(isset($_POST['usuario']) || isset($_POST['email']) || isset($_POST['senha'])){

        
        if(strlen($_POST['usuario']) == 0) {
            echo "Preencha seu usuario";
        } else if (strlen($_POST['email']) == 0) {
            echo "Preencha seu email";
        } else if (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {

            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
            $telefone = $_POST['telefone'];

            if(checkCredentials($pdo, $usuario, $email)) {
                
                $sql = "INSERT INTO usuarios (usr_usuario, usr_email, usr_senha, usr_telefone) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql); 
                $stmt->bindValue(1, $usuario, PDO::PARAM_STR);
                $stmt->bindValue(2, $email, PDO::PARAM_STR);
                $stmt->bindValue(3, $senha, PDO::PARAM_STR);
                $stmt->bindValue(4, $telefone, PDO::PARAM_STR);
    
                if ($stmt->execute()) {
                    echo "Cadastro realizado com sucesso!";
                } else {
                    echo "Erro no cadastro: " . implode(", ", $stmt->errorInfo());
                }

            } else {
                
                echo "<h1 style=\"color:red;\">usuario ou email ja cadastrados</h1>";
            }

        }
    
        
    } 
?>
