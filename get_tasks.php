<?php

$conn = new mysqli("localhost", "root", "", "checklist");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SELECT id, tarefa_name, status, dia_semana FROM tarefas ORDER BY dia_semana"; // Ordenando por dia da semana
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $previous_day = ""; // Variável para armazenar o dia da semana anterior
    while ($row = $result->fetch_assoc()) {
        if ($previous_day != $row["dia_semana"]) { // Verifica se o dia da semana mudou
            if ($previous_day != "") { // Verifica se não é a primeira tarefa
                echo "<br>"; // Adiciona um espaço entre as tarefas de dias diferentes
            }
            echo "<strong>" . $row["dia_semana"] . "</strong><br>"; // Mostra o dia da semana
            $previous_day = $row["dia_semana"]; // Atualiza o dia da semana anterior
        }
        echo "<li>" . $row["tarefa_name"] . " - " . $row["dia_semana"];
        echo " <form action='update_status.php' method='POST'>";
        echo "<input type='hidden' name='task_id' value='" . $row["id"] . "'>";
        echo "<select name='status'>";
        echo "<option value='aberto'" . ($row["status"] == "aberto" ? " selected" : "") . ">Aberto</option>";
        echo "<option value='andamento'" . ($row["status"] == "andamento" ? " selected" : "") . ">Em Andamento</option>";
        echo "<option value='finalizado'" . ($row["status"] == "finalizado" ? " selected" : "") . ">Finalizado</option>";
        echo "</select>";
        echo "<button type='submit'>Atualizar Status</button>";
        echo "</form>";
        echo "</li>";
    }
} else {
    echo "Nenhuma tarefa encontrada.";
}

$conn->close();

?>
