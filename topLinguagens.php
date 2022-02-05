<?php
    // IMPORTANDO DADOS
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    // CHAMANDO A SESSÃO
    session_start();

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
        
        <!-- CSS PRÓPRIO -->
        <link href="estilos/estiloGeral.css" rel="stylesheet">
        
        <!-- FAVICON -->
        <link rel="icon" href="imagens/iconeProjeto.png" type="image/png">

        <!-- CHARTS.JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                            Veja as linguagens mais discutidas no fórum.
                        </div>
                    </div>

                    <!-- SETANDO TOP 5 LINGUAGENS -->
                    <canvas id="myChart" width="400" height="400"></canvas>
                    <input type="hidden" id="ling1" value="PHP"></input>
                    <input type="hidden" id="ling2" value="CSS"></input>
                    <input type="hidden" id="ling3" value=""></input>
                    <input type="hidden" id="ling4" value=""></input>
                    <input type="hidden" id="ling5" value=""></input>
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

<!-- JS PRÓPRIO -->
<script src="js/funcoes.js"></script>