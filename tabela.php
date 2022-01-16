<?php 
    include("dbConnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos/estiloTabela.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <div class="col text-center">
            <a href="cadastro.php" class="btn btn-primary">Voltar a Tela de Cadastro</a>
        </div>
        <div class="container">
            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link" href="#">ID</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Nome</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Email</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Senha</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Ação</a></div>
                </div>
                <div class="table-content">	
                    <?php 
                        $listagem = $conn->prepare("SELECT * FROM usuario");
                        $listagem->execute();

                        while($usuario_info = $listagem->fetch(PDO::FETCH_ASSOC))
                        {
                    ?>
                            <div class="table-row">		
                                <div class="table-data"><?php echo $usuario_info['id']; ?></div>
                                <div class="table-data"><?php echo $usuario_info['nome_user']; ?></div>
                                <div class="table-data"><?php echo $usuario_info['email_user']; ?></div>
                                <div class="table-data"><?php echo $usuario_info['senha_user']; ?></div>
                                <div class="table-data">
                                    <a href="editarCadastro.php?id=<?php echo $usuario_info['id']; ?>" class="btn btn-primary" style="margin-right:2px">Editar</a>
                                    <a href="excluir.php?id=<?php echo $usuario_info['id']; ?>" class="btn btn-danger">Excluir</a>
                                </div>
                            </div>
                    <?php 
                        }
                    ?>
                </div>	
            </div>
        </div>
    </body>
</html>