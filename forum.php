<?php

/* $usuario_logado = $_GET['user'];

echo $usuario_logado; */

?>

<!DOCTYPE html>
<html lang="en">
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
        <title>Cadastro - Projeto CRUD</title>
    </head>
    <body>

        <div class="container">
            <div class="row">

                <!-- MENU DE LINGUAGENS -->
                <div class="col-2">
                    <a href="forum.php">
                        <div class="mt-3 d-flex justify-content-center border-bottom">
                            <img src="imagens/iconeProjeto.png" width="80" height="80">
                        </div>
                    </a>
                    <div class="d-flex justify-content-center">
                        <i class="devicon-php-plain" style="font-size:60px;"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <i class="devicon-javascript-plain" style="font-size:40px;"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <i class="devicon-html5-plain" style="font-size:45px;"></i>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <i class="devicon-css3-plain" style="font-size:45px;"></i>
                    </div>
                </div>

                <!-- FEED -->
                <div class="col-8 border">
                    <div class="mt-3 p-3 border-bottom">
                        <div class="mb-3">
                            <img src="imagens/UserDefault.png" class="rounded-circle" width="40" height="40">
                            Nome
                        </div>
                        <div class="">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <div class="mt-2">
                            <a href="">
                                Responder <i class="far fa-comment-dots"></i>
                            </a>
                            <i class="ms-3 devicon-css3-plain" style="font-size:20px;"></i>
                        </div>
                    </div>
                    <div class="mt-3 p-3 border-bottom">
                        <div class="mb-3">
                            <img src="imagens/UserDefault.png" class="rounded-circle" width="40" height="40">
                            Nome
                        </div>
                        <div class="">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <div class="mt-2">
                            <a href="">
                                Responder <i class="far fa-comment-dots"></i>
                            </a>
                            <i class="ms-3 devicon-css3-plain" style="font-size:20px;"></i>
                        </div>
                    </div>
                </div>


                <div class="col-2">
                    <div class="border-bottom">
                        <div class="mb-2 mt-3 d-flex justify-content-center">
                            <img src="imagens/UserDefault.png" class="rounded-circle" width="40" height="40">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            Usuário Usuário
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <i class="fas fa-trophy me-2" style="font-size:30px"></i>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <i class="fas fa-cog me-2" style="font-size:30px"></i>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>