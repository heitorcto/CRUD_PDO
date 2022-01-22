<?php
    // IMPORTANDO DADOS
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Crud\Usuario;

    // INSERINDO A CLASSE DO BOOTSTRAP PADRÃO PARA O FORMULÁRIO
    $validar = "needs-validation";

    // ATRIBUINDO VAZIO A TODAS AS MENSAGENS QUE PODERÃO SER EMITIDAS
    $mensagem_aviso = null;
    $mensagem_email = null;
    $mensagem_sucesso = null;
    $mensagem_erro = null;
                      
    // PASSANDO VALOR DO INPUT HIDDEN PARA DETERMINAR A AÇÃO DO POST
    $acao_post = "cadastrar";
    $botão_acao = "Cadastrar-se";
    if(isset($_GET["editar"]))
    {
        $acao_post = "editar";
        $botão_acao = "Editar";

        // RESGATA O ID DO USUÁRIO PARA RESGATAR VALORES DO MESMO 
        $id_usuario_editar = $_GET['id'];

        // PERCORRE O BANCO E RESGATA O VALOR REFERENTE AO ID
        $usuario_editar = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $usuario_editar->bindParam('id', $id_usuario_editar);
        $usuario_editar->execute();
        $usuario_info = $usuario_editar->fetch(PDO::FETCH_ASSOC);  
    }

    // A VERIFICAÇÃO DE CADASTRO SÓ IRÁ ACONTECER APÓS O POST DO FORMULÁRIO
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        // VERIFICA SE A AÇÃO É DE EDITAR
        if($_POST['acao'] == "editar")
        {
            // VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
            if($_POST['nome'] != "" && $_POST['email'] != "" && $_POST['senha'] != "" && $_POST['id_editar'] != "")
            {

                // SETANDO VARIÁVEL DE VERIFICAÇÃO DE E-MAIL
                $email_sistema = true;

                // CRIANDO NOVO OBJETO USUÁRIO
                $usuario = new Usuario; 
                
                // INSERINDO VALORES COM POST
                $usuario->setId($_POST['id_editar']);
                $usuario->setNome($_POST['nome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);

                // PASSANDO VALORES DO POST PARA AS VARIÁVEIS E EXECUTANDO O INSERT
                $id = $usuario->getId();
                $nome = $usuario->getNome();
                $email = $usuario->getEmail();
                $senha = $usuario->getSenha();

                // VERIFICANDO SE O E-MAIL QUE O USUÁRIO ESTÁ TENTANDO EDITAR JÁ ESTÁ CADASTRADO NO SISTEMA
                $percorre_usuarios = $conn->prepare("SELECT * FROM usuario WHERE id != :id");
                $percorre_usuarios->bindParam('id', $id);
                $percorre_usuarios->execute();
                while($dados_usuarios = $percorre_usuarios->fetch(PDO::FETCH_ASSOC))
                {
                    if($email == $dados_usuarios['email_user'])
                    {

                        // SETANDO VARIÁVEL COMO FALSA PARA NÃO INSERIR NO BANCO DE DADOS E EMITINDO UMA MENSAGEM DE ERRO
                        $email_sistema = false;
                        $mensagem_erro = "<div class='alert alert-danger' role='alert'>E-mail já se encontra no sistema!</div>";

                    } 
                }

                if($email_sistema == true){

                    // EDITANDO NO BANCO COM VERIFICAÇÃO DE TRY CATCH
                    try {

                        // PREPARANDO O SQL E SEU PARÂMETRO
                        $editar = $conn->prepare("UPDATE usuario SET nome_user = :nome_user,  email_user = :email_user, senha_user = :senha_user WHERE id = :id");
                        $editar->bindParam('id', $id);
                        $editar->bindParam('nome_user', $nome);
                        $editar->bindParam('email_user', $email);
                        $editar->bindParam('senha_user', $senha);

                        // EXECUTANDO O UPDATE E EMITINDO MENSAGEM DE SUCESSO
                        $editar->execute();
                        $mensagem_sucesso = "<div class='alert alert-success' role='alert'>Editado com Sucesso!</div>";

                    } catch(PDOException $e) {

                        $mensagem_erro = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar!</div>";

                    }

                }
            }
        }

        // VERIFICA SE A AÇÃO É DE CADASTRO
        if($_POST['acao'] == "cadastrar"){

            // VERIFICANDO SE O POST FOI ENVIADO E SE O MESMO É DIFERENTE DE VAZIO
            if((isset($_POST['nome']) && $_POST['nome'] != "") && (isset($_POST['email']) && $_POST['email'] != "") && (isset($_POST['senha']) && $_POST['senha'] != "")){

                // CRIANDO NOVO OBJETO USUÁRIO
                $usuario = new Usuario; 

                // ATRIBUINDO VALORES COM POST
                $usuario->setNome($_POST['nome']);
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);

                $nome = $usuario->getNome();
                $email = $usuario->getEmail();
                $senha = $usuario->getSenha();

                // VERIFICANDO SE O E-MAIL JÁ ESTÁ CADASTRADO NO SISTEMA
                $percorre_usuarios = $conn->prepare("SELECT * FROM usuario");
                $percorre_usuarios->execute();
                while($dados_usuarios = $percorre_usuarios->fetch(PDO::FETCH_ASSOC))
                {
                    if($email == $dados_usuarios['email_user'])
                    {

                        // ATRIBUINDO NULO AO E-MAIL PARA QUE NÃO CONSIGA INSERIR 
                        $email = null;

                    } 
                }

                // INSERINDO NO BANCO COM VERIFICAÇÃO DE TRY CATCH
                try{

                    // PREPARANDO O SQL E SEU PARÂMETRO
                    $inserir = $conn->prepare("INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (:nome_user, :email_user, :senha_user)");
                    $inserir->bindParam('nome_user', $nome);
                    $inserir->bindParam('email_user', $email);
                    $inserir->bindParam('senha_user', $senha);

                    // EXECUTANDO O INSERT E EMITINDO MENSAGEM DE SUCESSO
                    $inserir->execute();
                    $mensagem_sucesso = "<div class='alert alert-success' role='alert'>Cadastrado com Sucesso!</div>";

                } catch(PDOException $e) {

                    // EMITINDO ERRO QUANDO O USUÁRIO NÃO FOR INSERIDO
                    $mensagem_erro = "<div class='alert alert-danger' role='alert'>E-mail já cadastrado!</div>";

                }
            } else {

                // MODIFICANDO A CLASSE CASO A VALIDAÇÃO TENHA SIDO MAL SUCEDIDA
                $validar = "was-validated";
                $mensagem_aviso = "Campo obrigatório!";

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
        
        <!-- JS PRÓPRIO -->
        <script src="js/funcoes.js"></script>
        
        <!-- CSS PRÓPRIO -->
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
                            <img class="img_pb" id="img_pb" src="imagens/iconeProjeto.png" alt="logo" width="100">
                        </div>
                        <?php echo $mensagem_sucesso; ?>
                        <?php echo $mensagem_erro; ?>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4 text-center">Cadastro</h1>
                                <form method="POST" action="cadastro.php<?php if(isset($_GET["editar"])) { echo "?editar&id=".$id_usuario_editar; }?>" id="form" class="<?php echo $validar; ?>">

                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php if(isset($_GET["editar"])) { echo $usuario_info['nome_user']; } ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            <?php echo $mensagem_aviso; ?>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php if(isset($_GET["editar"])) { echo $usuario_info['email_user']; } ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            <?php echo $mensagem_aviso; ?>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="mb-2 w-100">
                                        </div>
                                        <input type="password" class="form-control" placeholder="Senha" name="senha" value="<?php if(isset($_GET["editar"])) { echo $usuario_info['senha_user']; } ?>" required>
                                        <div class="invalid-feedback">
                                            <?php echo $mensagem_aviso; ?>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="acao" value="<?php echo $acao_post; ?>">

                                    <?php if(isset($_GET["editar"])) { ?> <input type="hidden" name="id_editar" value="<?php echo $id_usuario_editar; ?>"> <?php } ?>

                                    <div class="text-center">
                                        <a href="#" onclick="cadastro()" class="btn btn-purple">
                                            <?php echo $botão_acao; ?>
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    Já tem uma conta? <a href="login.php" class="text-dark">Entrar!</a>
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