<?php
    // IMPORTANDO DADOS
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Post\Postagem;

    // CHAMANDO A SESSÃO
    session_start();

    $postagem = new Postagem;

    // VERIFICANDO POST PARA CRIAÇÃO DE UMA DISCUSSÃO NO FÓRUM
    if(isset($_POST['descricao']) && (isset($_POST['codigo']) || isset($_POST['linguagem'])))
    {
        //inserir na tabela e exibir no fórum
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
                    <div class="d-flex justify-content-center mb-2">
                        <i class="zoom_icone devicon-php-plain"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <i class="zoom_icone devicon-javascript-plain"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <i class="zoom_icone devicon-html5-plain"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <i class="zoom_icone devicon-css3-plain"></i>
                    </div>
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

                     <!-- POST -->
                    <div class="mt-3 p-3 border-bottom">
                        <!-- NOME DO USUÁRIO -->
                        <div class="mb-2">
                            <img src="imagens/UserDefault.png" class="rounded-circle" width="40" height="40">
                            Nome
                        </div>
                        <!-- DESCRIÇÃO -->
                        <div class="p-1">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <!-- RESPONDER -->
                        <div class="mt-2">
                            <a href="">
                                Responder <i class="far fa-comment-dots"></i>
                            </a>
                            <!-- ÍCONE DA LINGUAGEM -->
                            <i class="ms-3 devicon-css3-plain" style="font-size:20px;"></i>
                        </div>
                    </div>

                    <!-- CASO NÃO TENHA POSTS -->
                    <div class="mt-3 p-3 border-bottom d-flex justify-content-center">
                        SEM POSTS ATÉ O MOMENTO
                    </div>

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

                    <!-- 10 LINGUAGENS MAIS DISCUTIDAS -->
                    <div class="mt-3 d-flex justify-content-center">
                        <i class="zoom_icone fas fa-trophy me-2"></i>
                    </div>

                    <!-- CONFIGURAÇÕES DO USUÁRIO -->
                    <div class="mt-3 d-flex justify-content-center">
                        <i class="zoom_icone fas fa-cog me-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>