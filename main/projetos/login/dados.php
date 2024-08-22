<?php
    include "conexao.php";

    date_default_timezone_set('America/Los_Angeles');

    // colhe as postagens
    $nome_aluno = $_POST['nome_aluno'];
    $nusp = $_POST['nusp'];
    $email = $_POST['email'];

    // insere os dados na variável a ser enviada para o arquivo conexão
    $sql = "INSERT INTO `login` (`nome_aluno`, `nusp`, `email`) VALUES ('$nome_aluno', '$nusp', '$email');";

    // insert in database 
    $post = mysqli_query($conn, $sql);

    if($post)
    {
        echo "Dados armazenados";
    }
    else {
        echo "Erro no aramazenamento dos dados";
    }

    ?>