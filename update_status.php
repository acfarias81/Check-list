<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST["task_id"];
    $status = $_POST["status"];

    $conn = new mysqli("localhost", "root", "", "checklist");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $sql = "UPDATE tarefas SET status='$status' WHERE id=$task_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona de volta para a página inicial
        exit();
    } else {
        echo "Erro ao atualizar status da tarefa: " . $conn->error;
    }

    $conn->close();
}

?>
