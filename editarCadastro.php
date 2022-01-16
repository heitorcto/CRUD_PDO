<?php
    include("dbConnect.php");
    $id_usuario = $_GET['id'];

    $listagem = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
    $listagem->bindParam('id', $id_usuario);
    $listagem->execute();
    $usuario_info = $listagem->fetch(PDO::FETCH_ASSOC);             
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
        <title>Cadastro - Projeto CRUD</title>
    </head>
    <body>
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-5">
                            <img src="imagens/favicon.png" alt="logo" width="100">
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4 text-center">Editar Cadastro</h1>
                                <form method="POST" action="editar.php" class="needs-validation">

                                    <div class="mb-3">
                                        <input type="text" value="<?php echo $usuario_info['nome_user']; ?>" class="form-control" name="nome" placeholder="Nome">
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" value="<?php echo $usuario_info['email_user']; ?>" class="form-control" placeholder="E-mail" name="email">
                                    </div>

                                    <div class="mb-4">
                                        <input type="password" value="<?php echo $usuario_info['senha_user']; ?>" class="form-control" placeholder="Senha" name="senha">
                                    </div>

                                    <input type="hidden" value="<?php echo $usuario_info['id']; ?>" name="id">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-purple">
                                            Editar
                                        </button>
                                    </div>

                                </form>
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