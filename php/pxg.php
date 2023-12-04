<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vendas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores do formulário
    $kkspxg = $_POST["kkspxg"];
    $serverpxg = $_POST["serverpxg"];

    // Verificar se o banco de dados e a tabela existem, criar se necessário
    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($createDatabaseQuery);

    $conn->select_db($dbname);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS vendaspxg (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kkspxg INT(6) NOT NULL,
        serverpxg VARCHAR(30) NOT NULL
    )";
    $conn->query($createTableQuery);

    // Inserir dados na tabela
    $insertQuery = "INSERT INTO vendaspxg (kkspxg, serverpxg) VALUES ('$kkspxg', '$serverpxg')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
