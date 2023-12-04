<?php
// Informações de conexão com o MySQL
$hostname = "seu_hostname";
$username = "seu_username";
$password = "sua_senha";

// Conexão ao MySQL
$conn = new mysqli($hostname, $username, $password);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o MySQL: " . $conn->connect_error);
}

// Criação do banco de dados
$databaseName = "seu_banco_de_dados";
$createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($createDatabaseSQL) === TRUE) {
    echo "Banco de dados criado com sucesso";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Seleciona o banco de dados recém-criado
$conn->select_db($databaseName);

// Criação da tabela
$createTableSQL = "CREATE TABLE IF NOT EXISTS tabela_vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kks VARCHAR(255) NOT NULL,
    server INT NOT NULL
)";

if ($conn->query($createTableSQL) === TRUE) {
    echo "Tabela criada com sucesso";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
