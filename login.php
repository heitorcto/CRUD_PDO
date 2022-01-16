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

<form class='login-form' action="perfil.php" method="POST">
    <div class="flex-row">
        <input name="email"class='lf--input' placeholder='Email' type='email' required>
    </div>
    <div class="flex-row">
        <input name="senha" class='lf--input' placeholder='Senha' type='password' required>
    </div>
    <input class='lf--submit' type='submit' value="Entrar">
</form>

</body>
</html>