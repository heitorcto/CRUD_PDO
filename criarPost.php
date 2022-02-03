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

                <!-- CRIAÇÃO DO POST -->
                <div class="col-8 border">
                    <div class="p-3">
                        <div class="mb-3">
                            <a href="forum.php" type="button" class="btn btn-purple">Voltar</a>
                        </div>
                        <form action="forum.php" method="post">
                            <!-- DESCRIÇÃO -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                <div class="form-floating">
                                    <textarea name="descricao" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <!-- CÓDIGO -->
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Seu código</label>
                                <div class="form-floating">
                                    <textarea name="codigo" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <!-- LINGUAGEM -->
                            <div class="mb-3">
                                <select name="linguagem" class="form-select" aria-label="Default select example">
                                    <option value="">Selecione a Linguagem</option>
                                    <option value="PHP">PHP</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="JS">JS</option>
                                </select>
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-purple">Postar</button>
                            </div>
                        </form>
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
                            Heitor CT
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