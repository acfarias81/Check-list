<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 30px;
        }

        form {
            margin-bottom: 30px;
        }

        select {
            margin-right: 10px;
        }

        hr {
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Checklist</h2>
        <form action="add_task.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="tarefa_name" placeholder="Nova Tarefa">
            </div>
            <div class="form-group">
                <select class="form-control" name="dia_semana">
                    <option value="Segunda-feira">Segunda-feira</option>
                    <option value="Terça-feira">Terça-feira</option>
                    <option value="Quarta-feira">Quarta-feira</option>
                    <option value="Quinta-feira">Quinta-feira</option>
                    <option value="Sexta-feira">Sexta-feira</option>
                    <option value="Sabado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                    <!-- Adicione as opções para os outros dias da semana -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
        </form>
        <hr>
        <h3>Tarefas</h3>
        <ul>
            <?php include 'get_tasks.php'; ?>
        </ul>
      
    </div>
</body>

</html>
