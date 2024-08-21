<?php

session_start();

include("php/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_aluno = $_POST["nome_aluno"];
        $nusp = $_POST["nusp"];
        $email = $_POST["email"];
        $idaluno = null;

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $checkStmt = $conn->prepare("SELECT COUNT(*) FROM login WHERE nusp = :nusp");
            $checkStmt->bindParam(':nusp', $nusp);
            $checkStmt->execute();
            $count = $checkStmt->fetchColumn();
            
            if($count > 0 ){

                $sql = "SELECT nusp, nome FROM login WHERE nusp = :nusp";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":nusp", $nusp);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);


                if ($nusp == $row['nusp']) {
                    $nome_aluno = $row['nome_aluno'];
                    echo "<script>sessionStorage.setItem('nome_aluno', " . $nome_aluno . ");</script>";

                }
                
            }else{
            
                $stmt = $conn->prepare("INSERT INTO login (nome_aluno, nusp, email) VALUES (:nome_aluno, :nusp, :email)");
                $stmt->bindParam(':nome_aluno', $nome_aluno);
                $stmt->bindParam(':nusp', $nusp);
                $stmt->bindParam(':email', $email);


                if ($stmt->execute()) {

                    $sql = "SELECT nome FROM login WHERE nusp = :nusp;
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":nusp", $nusp);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $nome_aluno = $row['nome_aluno'];

                    echo "<script>sessionStorage.setItem('nome_aluno', " . $nome_aluno . ");</script>";

                } else {
                    echo "Erro ao inserir dados no banco de dados.";
                }

            
            }
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
}
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Entre na clínica</title>
    <link rel="icon" href="#">
    <style>
    input[type="submit"] {
    
    width: 100%;

    margin-top: 40px;
    padding: 8px 0 8px 15px;

    background: #b22222;

    border-radius: 30px;
    border: none;
    outline: none;

    color: #F8F6EA;
    font-size: 18px; 
    font-family: 'Noto Sans JP', sans-serif;

    cursor: pointer;
}
    </style>

</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<main>
<header>
    <div class="Logo">
        <h1 class="Mizuki-logo">Mizuki</h1>
    </div>

    <nav class="NavBar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="index.html#servicos">Serviços</a></li>
            <li><a href="index.html#sobre">Sobre</a></li>
            <li><a class="active" href="#">Agendar</a></li>
        </ul>
    </nav>
</header>


<div class="container">
    <div class="buttonsForm">

      <div class="btnColor"></div>
      <button id="btnPerfil">Perfil</button>
      <button id="btnAgendamento">Agendar</button>
    </div>

    <form id="Login" name="LoginForm" action="" method="post">
        <input type="text" id="nome_aluno" name="nome_aluno" placeholder="Nome" required />
        <input type="int" id="nusp" name="nusp" placeholder="NUSP" maxlength="8" required />
        <input type="text" id="email" name="email" placeholder="Email" required />
        <span id="cpfError" class="error"></span>

      <select id="curso" name="curso" placeholder="Cursos"required>
        <option value="" disabled selected>Selecione seu procedimento</option>
        <?php
                try {
                    // Consulta SQL para obter os cursos disponíveis
                    $cursosStmt = $conn->prepare("SELECT nome_curso FROM cursos");
                    $cursosStmt->execute();

                    // Preenche dinamicamente as opções do select com os serviços do banco de dados
                    while ($curso = $cursosStmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$curso['nome_curso']}'>{$cursos['nome_curso']}</option>";
                    }
                } catch (PDOException $e) {
                    echo "Erro na consulta ao banco de dados: " . $e->getMessage();
                }
            ?>
    </select>
      <input type="button" id="btnRegistrar" value="Enviar" onclick="enviar()">
    </form>
  </div>


<footer>
</footer>


<script>
    var LoginForm = document.querySelector('#Login')
    var Inputnome = document.querySelector('#nome_aluno')
    var Inputnusp = document.querySelector('#nusp')
    var Inputemail = document.querySelector('#email')

    // function enviar() {
    //     var id = sessionStorage.getItem("id");
    //     var servico = document.getElementById("servico").value;
    //     var data = document.getElementById("data").value;
    //     var horario = document.getElementById("horario").value;

    //     $.ajax({
    //         type: "POST",
    //         url: "php/processar_agendamento.php",
    //         data: { id: id, servico: servico, data: data, horario: horario },
    //         success: function(response) {
    //             console.log(response);
    //             alert("Agendamento realizado com sucesso!")
    //             document.getElementById("servico").value = "";
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // }


</script>
</main>
</body>
</html>