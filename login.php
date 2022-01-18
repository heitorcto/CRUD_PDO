<?php
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Crud\Usuario;

    $usuario = new Usuario;

    if(isset($_POST['email']) && isset($_POST['senha']))
    {
        // CRIANDO AS VARIÁVEIS 
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $verificar_tabela = $conn->prepare("SELECT * FROM usuario");
        $verificar_tabela->execute();

        while($usuario_info = $verificar_tabela->fetch(PDO::FETCH_ASSOC))
        {
            if($email == $usuario_info['email_user'] && $senha == $usuario_info['senha_user']){
                echo "Tem um registro igualzinho! Ebaaaaaaaaaa";
            } else {
                echo "Não tem registro! Tristeza total!";
            }
        }
    }
?>
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
        <title>Login - Projeto CRUD</title>
    </head>
    <body>
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-5">
                            <img class="img_pb" src="imagens/iconeProjeto.png" alt="logo" width="100">
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4 text-center">Login</h1>
                                <form method="POST" action="login.php" class="needs-validation">
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" required autofocus>
                                        
                                    </div>
                                    <div class="mb-4">
                                        <div class="mb-2 w-100">
                                            <!-- <a href="forgot.html" class="float-end">
                                                Forgot Password?
                                            </a> -->
                                        </div>
                                        <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                                    </div>

                                    <div class="text-center">
                                        <!-- <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label">Remember Me</label>
                                        </div> -->
                                        <button type="submit" class="btn btn-purple">
                                            Entrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    Não tem uma conta? <a href="cadastro.php" class="text-dark">Crie uma!</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5 text-muted">
                            Copyright &copy; 2022-<?php echo date("Y"); ?> &mdash; Projeto CRUD
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>