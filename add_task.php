<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarefa_name = $_POST["tarefa_name"];
    $dia_semana = $_POST["dia_semana"];

    $conn = new mysqli("localhost", "root", "", "checklist");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tarefas (tarefa_name, dia_semana) VALUES ('$tarefa_name', '$dia_semana')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona de volta para a página inicial
        exit();
    } else {
        echo "Erro ao adicionar tarefa: " . $conn->error;
    }

    $conn->close();
}

?>
