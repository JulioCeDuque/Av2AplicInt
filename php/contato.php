<?php
$servername = "sql10.freemysqlhosting.net";
$username = "sql10667592";
$password = "3iXPFavbVn";
$dbname = "sql10667592";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($createDatabaseQuery);

    $conn->select_db($dbname);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS vendasgeral (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(56) NOT NULL,
        email VARCHAR(56) NOT NULL,
        mensagem VARCHAR(250) NOT NULL
    )";
    $conn->query($createTableQuery);

    $insertQuery = "INSERT INTO vendasgeral (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: /Av2AplicInt/contact.html"); 
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

$conn->close();
?>
