<?php
    include("dbConnect.php");
    require_once __DIR__ . '/vendor/autoload.php';

    use Crud\Usuario;

    $usuario = new Usuario;

    // VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if($_POST['nome'] != "" && $_POST['email'] != "" && $_POST['senha'] != "")
    {
        // INSERINDO VALORES COM POST
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        try {
            // PREPARANDO O SQL E SEU PARÂMETRO
            $stmt = $conn->prepare("INSERT INTO usuario (nome_user, email_user, senha_user) VALUES (:nome_user, :email_user, :senha_user)");
            $stmt->bindParam('nome_user', $nome);
            $stmt->bindParam('email_user', $email);
            $stmt->bindParam('senha_user', $senha);

            // PASSANDO VALORES DO POST PARA AS VARIÁVEIS E EXECUTANDO O INSERT
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $stmt->execute();

            include("sucesso.php");

        } catch(PDOException $e) {
            echo "Cadastro falhou -> ".$e->getMessage();
        }
    }

?>