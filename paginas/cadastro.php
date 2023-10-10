

<div id="cadastro" class="content">
<form action="" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="telephone" name="telefone"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
        
</div> 

<?php 

    //IS SET 


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

            $sql = "INSERT INTO usuarios (usr_usuario, usr_email, usr_senha, usr_telefone) VALUES (?, ?, ?, ?)";
            $stmt = $link->prepare($sql); 
            $stmt->bind_param("ssss", $usuario, $email, $senha, $telefone);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro no cadastro: " . $stmt->error;
            }
        }
    
        
    }
?>
