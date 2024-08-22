<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hackerspace_projetos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    echo "Conexão falhou";
}
?>