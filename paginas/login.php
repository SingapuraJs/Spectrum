<?php 
    if(isset($_POST['usuario'])){
        
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usr_usuario = '$usuario'";
        $sql_exec = $link->query($sql) or die($link->error);

        if ($sql_exec->num_rows > 0) {
            $usuario = $sql_exec->fetch_assoc();
            if (password_verify($senha, $usuario['usr_senha'])) {
                echo "Login efetuado";
            } else {
                echo "Usuário ou senha incorretos";
            }
        } else {
            echo "Usuário não encontrado";
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

