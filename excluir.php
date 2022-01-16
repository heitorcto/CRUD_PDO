<?php
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Crud\Usuario;

    $usuario = new Usuario;

    // VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if($_GET['id'] != "")
    {
        // INSERINDO VALORES COM POST
        $usuario->setId( $_GET['id']);

        try {
            // PREPARANDO O SQL E SEU PARÂMETRO
            $stmt = $conn->prepare("DELETE FROM usuario WHERE id = :id");
            $stmt->bindParam('id', $id);

            // PASSANDO VALORES DO POST PARA AS VARIÁVEIS E EXECUTANDO O INSERT
            $id = $usuario->getId();
            $stmt->execute();

            include("sucesso.php");
        } catch(PDOException $e) {
            echo "Exclusão falhou -> ".$e->getMessage();
        }
    }

?>