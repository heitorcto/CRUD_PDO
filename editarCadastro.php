<?php
    include("dbConnect.php");
    $id_usuario = $_GET['id'];

    $listagem = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
    $listagem->bindParam('id', $id_usuario);
    $listagem->execute();
    $usuario_info = $listagem->fetch(PDO::FETCH_ASSOC);             
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloCadastro.css">
    <title>Document</title>
</head>
    <body>

        <form class='login-form' action="editar.php" method="POST">
            <div class="flex-row">
                <input value="<?php echo $usuario_info['nome_user']; ?>" name="nome" class='lf--input' placeholder='Nome' type='text' required>
            </div>
            <div class="flex-row">
                <input value="<?php echo $usuario_info['email_user']; ?>" name="email"class='lf--input' placeholder='Email' type='email' required>
            </div>
            <div class="flex-row">
                <input value="<?php echo $usuario_info['senha_user']; ?>" name="senha" class='lf--input' placeholder='Senha' type='password' required>
            </div>
                <input type="hidden" value="<?php echo $usuario_info['id']; ?>" name="id">
            <input class='lf--submit' type='submit' value="Atualizar">
        </form>
        
    </body>
</html>