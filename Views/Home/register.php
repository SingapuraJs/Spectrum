<?php
    include("./config/database.php");

    if(!isset($_SESSION)){
        session_start();
    }
    require_once('./func/functions.php');
    isNOTLogged();
    
    
?>
<div class="my-5 d-flex align-items-center justify-content-center">

    <div class="border border-dark rounded p-5">

        <form action="" method="POST">
    
            <div class="form-group">
    
                <label>Usuário</label>
                <input type="text" class="form-control" name="usuario" required placeholder="Digite seu usuário.">
    
            </div>
    
            <div class="form-group">
                
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" required placeholder="Digite seu E-mail.">
    
            </div>
            
            <div class="form-group">
             
                <label>Senha</label>
                <input type="password" class="form-control" name="senha" required placeholder=" Digite sua senha.">
    
            </div>
    
            <div class="form-group">
    
                <label for="phoneNumber">Telefone</label>
                <input type="tel" class="form-control" name="telefone" placeholder="(00) 91234-4567">
      
            </div>
    
            <div class="float-end">
                <button type="submit" class="btn btn-dark mt-4">Enviar</button>
            </div>
            
        </form>

    </div>

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
