<?php
$servername = "sql10.freemysqlhosting.net";
$username = "sql10667592";
$password = "3iXPFavbVn";
$dbname = "sql10667592";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$selectQuery = "SELECT * FROM vendasgeral";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Kks : " . $row["kks"]. " - Servidor : " . $row["server"]. "<br>";
    }
} else {
    echo "Nenhum dado encontrado.";
}

$conn->close();
?>
