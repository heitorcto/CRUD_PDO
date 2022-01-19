<?php 
    // VERIFICA SE A CONEXÃO COM O BANCO DEU CERTO
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão bem sucedida!";
    } catch(PDOException $e) {
        //echo "Conexão falhou -> ".$e->getMessage();
    }
?>