<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    require_once('./func/functions.php');
    isLogged();

    require_once('./config/database.php');
    

    $userCredentials = getUserCredentials($pdo, $_SESSION['id']);

    $username = $userCredentials[0];
    $email = $userCredentials[1];
    $number = $userCredentials[2] ? $userCredentials[2] : "Ainda não cadastrado";
    $hashSenha = $userCredentials[3];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $newUsername = $_POST['usuario'] !== $username ? $_POST['usuario'] : null;
        $newEmail = $_POST['email'] !== $email ? $_POST['email'] : null;
        $newNumber = $_POST['telefone'] !== $number ? $_POST['telefone'] : null;
        $senhaAtual = $_POST['senhaAtual'];
        $senhaNova = password_hash($_POST['senhaNova'], PASSWORD_DEFAULT);

        if(($newUsername != null) && ($newEmail != null) && ($newNumber != null)){
            if(checkCredentials($pdo, $newUsername, $newEmail)) {

                if(password_verify($senhaAtual, $hashSenha))
                    $sql = "UPDATE usuarios 
                    SET 
                        usr_usuario = :usuario,
                        usr_email = :email,
                        usr_senha = :senha,
                        usr_telefone = :telefone
                    WHERE id_usuario = " . $_SESSION['id'];

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':usuario', $newUsername, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
                    $stmt->bindParam(':senha', $senhaNova, PDO::PARAM_STR);
                    $stmt->bindParam(':telefone', $newNumber, PDO::PARAM_STR);

                    $stmt->execute();

            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div id="formEdit" class="content">
        <form action="" method="post">
            <label for="usuario">Usuario: <input type="text" name="usuario" value="<?= $username ?>" required></label>

            <label for="email">Email: <input type="email" name="email" value="<?= $email ?>" required></label>

            <label for="senha">Senha atual: <input type="password" name="senhaAtual" placeholder="Digite sua senha" required></label>

            <label for="senha">Nova senha: <input type="password" name="senhaNova" placeholder="Digite sua nova senha" required></label>

            <label for="telefone">Telefone: <input type="telephone" name="telefone" placeholder="<?= $number ?>"></label>

            <input type="submit" value="Enviar">            
        </form>
    </div>
</body>
</html>