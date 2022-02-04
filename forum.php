<?php
    // IMPORTANDO DADOS
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    // DEFININDO TIMEZONE PARA BRASIL - SP
    date_default_timezone_set('America/Sao_Paulo');

    use Post\Postagem;

    // CHAMANDO A SESSÃO
    session_start();

    $postagem = new Postagem;

    // VERIFICANDO POST PARA CRIAÇÃO DE UMA DISCUSSÃO NO FÓRUM
    if(isset($_POST['descricao']) && (isset($_POST['codigo']) || isset($_POST['linguagem'])))
    { 
        // INSERINDO VALORES COM POST
        $postagem->setUser_id($_SESSION['user']);
        $postagem->setDescricao_post($_POST['descricao']);
        $postagem->setCodigo_post($_POST['codigo']);
        $postagem->setLinguagem_post($_POST['linguagem']);

        // PASSANDO VALORES DO POST PARA AS VARIÁVEIS E EXECUTANDO O INSERT
        $user_logado = $postagem->getUser_id();
        $descricao = $postagem->getDescricao_post();
        $codigo = $postagem->getCodigo_post();
        $linguagem = $postagem->getLinguagem_post();
        $data = date("d/m/Y");
        $hora = date("H:i");

        // INSERINDO NO BANCO COM VERIFICAÇÃO DE TRY CATCH
        try{

            // PREPARANDO O SQL E SEU PARÂMETRO
            $inserir_postagem = $conn->prepare("INSERT INTO postagem (user_post_nome, descricao_post, codigo_post, linguagem_post, data_post, hora_post) VALUES (:user_post_nome, :descricao_post, :codigo_post, :linguagem_post, :data_post, :hora_post)");
            $inserir_postagem->bindParam('user_post_nome', $user_logado);
            $inserir_postagem->bindParam('descricao_post', $descricao);
            $inserir_postagem->bindParam('codigo_post', $codigo);
            $inserir_postagem->bindParam('linguagem_post', $linguagem);
            $inserir_postagem->bindParam('data_post', $data);
            $inserir_postagem->bindParam('hora_post', $hora);

            // EXECUTANDO O INSERT
            $inserir_postagem->execute();

        } catch(PDOException $e) {

            // EMITINDO ERRO QUANDO O POST NÃO FOI INSERIDO
            echo $e->getMessage();

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

        <!-- DEV ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.14.0/devicon.min.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        
        <!-- JS PRÓPRIO -->
        <script src="js/funcoes.js"></script>
        
        <!-- CSS PRÓPRIO -->
        <link href="estilos/estiloGeral.css" rel="stylesheet">
        
        <!-- FAVICON -->
        <link rel="icon" href="imagens/iconeProjeto.png" type="image/png">

        <!-- TÍTULO DA PÁGINA -->
        <title>Fórum - Projeto CRUD</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!-- MENU DE LINGUAGENS -->
                <div class="col-2">
                    <a href="forum.php">
                        <div class="mt-3 d-flex justify-content-center border-bottom">
                            <img class="icone_zoom" src="imagens/iconeProjeto.png">
                        </div>
                    </a>
                    <a href="">
                       <div class="d-flex justify-content-center mt-2 mb-2 btn btn-king">
                            TOP 5
                        </div>
                    </a>
                    <?php 
                        // LISTAR TODOS AS LINGUAGENS
                        $listagem_linguagem = $conn->prepare("SELECT * FROM linguagens");
                        $listagem_linguagem->execute();

                        while($lings = $listagem_linguagem->fetch(PDO::FETCH_ASSOC))
                        { 
                    ?>
                            <a href="">
                            <div class="d-flex justify-content-center mt-2 mb-2 btn btn-purple">
                                    <?php echo $lings['tipo']; ?>
                                </div>
                            </a>
                    <?php 
                        }
                    ?>
                </div>

                <!-- FEED -->
                <div class="col-8 border">

                    <!-- PARA VOCÊ EFETUAR SEU POST -->
                    <div class="mt-3 p-3 border-bottom">
                        <!-- NOME DO USUÁRIO -->
                        <div class="d-flex justify-content-center mb-4">
                            Olá, <?php echo $_SESSION['user']; ?>, compartilhe suas experiências ou dúvidas.
                        </div>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="criarPost.php" type="button" class="btn btn-purple ms-3">Criar Post</a>
                        </div>
                    </div>

                    <?php 
                        // LISTAR TODOS OS POSTS
                        $listagem_postagem = $conn->prepare("SELECT * FROM postagem ORDER BY id DESC");
                        $listagem_postagem->execute();

                        while($post_info = $listagem_postagem->fetch(PDO::FETCH_ASSOC))
                        { 
                    ?>
                            <!-- POST -->
                            <div class="mt-3 p-3 border-bottom">
                                <!-- NOME DO USUÁRIO -->
                                <div class="mb-2">
                                    <img src="imagens/UserDefault.png" class="rounded-circle" width="40" height="40">
                                    <span class="ms-1 fs-6 fw-bold"><?php echo $post_info['user_post_nome']; ?></span>
                                    <span class="fs-6 fst-italic float-end"><?php echo $post_info['data_post']." às ".$post_info['hora_post']; ?></span>
                                </div>
                                <!-- DESCRIÇÃO -->
                                <div class="p-1">
                                    <?php echo $post_info['descricao_post']; ?>
                                </div>
                                <!-- RESPONDER -->
                                <div class="mt-2">
                                    <a class="btn btn-purple" href="">
                                        Ver Mais <i class="ms-1 fas fa-plus"></i>
                                    </a>
                                    <!-- ÍCONE DA LINGUAGEM -->
                                    <a href="">
                                        <div class="btn btn-purple">
                                            <?php echo $post_info['linguagem_post']; ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php 
                        }
                    ?>
                </div>

                <!-- USUÁRIO E OUTRAS INFORMAÇÕES -->
                <div class="col-2">
                    <!-- INFO DO USUÁRIO -->
                    <div class="border-bottom">
                        <!-- FOTO DO USUÁRIO -->
                        <div class="mb-2 mt-3 d-flex justify-content-center">
                            <img src="imagens/UserDefault.png" class="perfil_foto rounded-circle">
                        </div>
                        <!-- NOME DO USUÁRIO -->
                        <div class="mb-3 d-flex justify-content-center">
                            <?php echo $_SESSION['user']; ?>
                        </div>
                    </div>

                    <!-- CONFIGURAÇÕES DO USUÁRIO -->
                    <a href="">
                       <div class="d-flex justify-content-center mt-2 mb-2 btn btn-purple">
                            Config.
                        </div>
                    </a>

                    <!-- SAIR DO USUÁRIO -->
                    <a href="login.php">
                       <div class="d-flex justify-content-center mt-2 mb-2 btn btn-purple">
                            Sair
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>