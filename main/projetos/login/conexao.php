<?php

$host = "192.185.176.22";
$user = "mizuki77_admin";
$pass = "0,2+qYl,i])f";
$dbname = "mizuki77_mizuki";
$port = "";

try{
    // Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    // Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

}catch(PDOException $err){

    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
    
}