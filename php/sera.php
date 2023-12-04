<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vendas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $kks = $_POST["kks"];
    $server = $_POST["server"];

    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($createDatabaseQuery);

    $conn->select_db($dbname);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS vendasgeral (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kks INT(6) NOT NULL,
        server VARCHAR(30) NOT NULL
    )";
    $conn->query($createTableQuery);

    $insertQuery = "INSERT INTO vendasgeral (kks, server) VALUES ('$kks', '$server')";
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: /Av2AplicInt/sera.html"); 
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

$conn->close();
?>
