<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados disponíveis</title>
    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #create {
            background-color: green;
            padding: 10px;
            margin: 10px;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            width: max-content;
            display: block;
            text-decoration: none;
            transition: all .3s ease-in-out;
        }

        a:hover {
            transform: scale(1.1);
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 20px;
        }

        table {
            background-color: white;
            text-align: center;
        }

        th {
            background-color: lightskyblue;
        }

        tr:nth-child(odd) {
            background-color: lightblue;
        }

        button {
            border: none;
            font-weight: bold;
            color: white;
            padding: 5px;
            border-radius: 2px;
            cursor: pointer;
            transition: all .3s ease-in-out;
            text-decoration: none;
        }

        #update:hover, #delete:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        #update {
            background-color: green;
        }

        #delete {
            background-color: red;
        }
    </style>
</head>
<body>
    <a id="create" href="create.php">Adicionar novo</a>
    <?php 
        include 'conn.php';

        $query = 'SELECT * FROM `usuario`';
        $resultado = mysqli_query($conn, $query);
        $rows;

        echo "<table><tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Sexo</th>
        <th>Data Nasc</th>
        <th colspan='2'>Ações</th>
        </tr>";

        while ($rows = mysqli_fetch_object($resultado)) {
            echo '<tr>';
            echo '<td>' . $rows->id_Usuario . '</td>';
            echo '<td>' . $rows->nome_Usuario . '</td>';
            echo '<td>' . $rows->email_Usuario . '</td>';
            echo '<td>' . $rows->senha_Usuario . '</td>';
            echo '<td>' . $rows->sexo_Usuario . '</td>';
            echo '<td>' . $rows->nasc_Usuario . '</td>';
            echo "<td><form action='update.php'><button type='submit' name='update' id='update' value='$rows->id_Usuario'>Editar</button></td></form>";
            echo "<td><form action='delete.php'><button type='submit' name='delete' id='delete' value='$rows->id_Usuario'>Deletar</button></td></form>";
            echo '</tr>';
        };

        mysqli_close($conn);
    ?>
</body>
</html>