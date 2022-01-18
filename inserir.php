<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- INSERINDO BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- ESTILO PRÓPRIO -->
        <link href="estilos/estiloGeral.css" rel="stylesheet">
        
        <!-- FAVICON -->
        <link rel="icon" href="imagens/iconeProjeto.png" type="image/png">

        <!-- TÍTULO DA PÁGINA -->
        <title>Cadastro - Projeto CRUD</title>
    </head>
    <body>
        <?php
            include("dbConnect.php");
            require_once __DIR__ . '/vendor/autoload.php';

            use Crud\Usuario;

            $usuario = new Usuario;

            // VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
            if($_POST['nome'] != "" && $_POST['email'] != "" && $_POST['senha'] != "")
            {
                // INSERINDO VALORES COM POST
                $usuario->setNome($_POST['nome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);

                try {
                    // VERIFICA SE O NOME OU E-MAIL JÁ SE ENCONTRAM CADASTRADOS
                    $listagem = $conn->prepare("SELECT * FROM usuario");
                    $listagem->execute();
                    $nome_verificar = $usuario->getNome();
                    $email_verificar = $usuario->getEmail();
                    while($usuario_info = $listagem->fetch(PDO::FETCH_ASSOC))
                    {
                        if($nome_verificar == $usuario_info['nome_user'] || $email_verificar == $usuario_info['email_user'])
                        {
                            if($nome_verificar == $usuario_info['nome_user']){
                                $mensagem = "O nome ".$nome_verificar." já está em uso!";
                            } else if($email_verificar == $usuario_info['email_user']){
                                $mensagem = "O email ".$email_verificar." já está em uso!";
                            }
                            echo "<section class='h-100'>
                                    <div class='container h-100'>
                                        <div class='row justify-content-sm-center h-100'>
                                            <div class='col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9'>
                                                <div class='text-center my-5'>
                                                    <img class='img_pb' src='imagens/iconeProjeto.png' alt='logo' width='100'>
                                                </div>
                                                <div class='card shadow-lg'>
                                                    <div class='card-body p-5'>
                                                        <h1 class='fs-4 card-title fw-bold mb-4 text-center'>".$mensagem."</h1>
                                                        <form method='POST' action='inserir.php' class='needs-validation'>
                                                            <div class='text-center'>
                                                                <a href='cadastro.php' class='btn btn-purple'>
                                                                    Voltar ao cadastro
                                                                </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>";
                            exit;
                        }
                    }

                    // PREPARANDO O SQL E SEU PARÂMETRO
                    $stmt = $conn->prepare("INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (:nome_user, :email_user, :senha_user)");
                    $stmt->bindParam('nome_user', $nome);
                    $stmt->bindParam('email_user', $email);
                    $stmt->bindParam('senha_user', $senha);

                    // PASSANDO VALORES DO POST PARA AS VARIÁVEIS E EXECUTANDO O INSERT
                    $nome = $usuario->getNome();
                    $email = $usuario->getEmail();
                    $senha = $usuario->getSenha();
                    $stmt->execute();

                    include("sucesso.php");

                } catch(PDOException $e) {
                    echo "Cadastro falhou -> ".$e->getMessage();
                }
            }
        ?>
    </body>
</html>