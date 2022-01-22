<?php 
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Crud\Usuario;

    $usuario = new Usuario;

    // SETANDO MENSAGEM DE EXCLUSÃO DEL
    $mensagem = "";

    // VERIFICA SE O GET FOI SETADO
    if(isset($_GET['id'])){

        // VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
        if($_GET['id'] != "")
        {
            // INSERINDO VALORES COM POST
            $usuario->setId( $_GET['id']);
            $id = $usuario->getId();

            try {

                // PREPARANDO O SQL E SEU PARÂMETRO
                $excluir = $conn->prepare("DELETE FROM usuario WHERE id = :id");
                $excluir->bindParam('id', $id);

                // EXECUTANDO A EXCLUSÃO DO BANCO
                $excluir->execute();

                $mensagem = "<div id='mensagem' class='alert alert-success' role='alert'>Excluído com Sucesso! <a href='tabela.php'>Ok!</a> </div> ";

            } catch(PDOException $e) {

                $mensagem = "<div id='mensagem' class='alert alert-danger' role='alert'>Erro ao excluir Usuário.</div>";

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
        
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <!-- ESTILO PRÓPRIO -->
        <link href="estilos/estiloGeral.css" rel="stylesheet">
        
        <!-- FAVICON -->
        <link rel="icon" href="imagens/iconeProjeto.png" type="image/png">

        <!-- TÍTULO DA PÁGINA -->
        <title>Usuários - Projeto CRUD</title>
    </head>
    <body>

        <!-- TABELA -->
        <div class="container mt-5">
            <div class="text-center fs-4 card-title fw-bold mb-4 ">
                Usuários
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php echo $mensagem; ?>
                    <?php 
                        $listagem = $conn->prepare("SELECT * FROM usuario");
                        $listagem->execute();

                        while($usuario_info = $listagem->fetch(PDO::FETCH_ASSOC))
                        {
                    ?>
                            <tr>
                                <th><?php echo $usuario_info['id']; ?></th>
                                <td><?php echo $usuario_info['nome_user']; ?></td>
                                <td><?php echo $usuario_info['email_user']; ?></td>
                                <td><?php echo $usuario_info['senha_user']; ?></td>
                                <td> 
                                    <a href="cadastro.php?editar&id=<?php echo $usuario_info['id']; ?>" class="btn" style="margin-right:2px"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="tabela.php?excluir&id=<?php echo $usuario_info['id']; ?>" class="btn"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>   
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>  

        <div class="col text-center">
            <a href="cadastro.php" class="btn btn-purple">Voltar a Tela de Cadastro</a>
        </div>

    </body>
</html>