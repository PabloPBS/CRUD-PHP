<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            background-color: green;
            width: 90vw;
            text-align: center;
            font-weight: bold;
            color: white;
            margin: 0px;
            font-size: 1.5em;
            padding: 0px;
        }

        #container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
        }

        h1 {
            text-align: center;
        }

        #btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button {
            background-color: red;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }

        a {
            color: black;
            text-decoration: none;
            font-size: 1.2em;
            background-color: rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div id='container'>
        <h1>Tem certeza?</h1>
        <div id="btn">
            <form action="#" method="post">
                <button type="submit" name='R' value="R">Confirmar</button>
            </form>
            <a href="read.php">Voltar a página inicial</a>
        </div>

    </div>

    <?php 
        include ('conn.php');
        $id = $_GET['delete'];

        if (isset($_POST['R'])) {
            $query = "DELETE FROM `usuario` WHERE `id_Usuario` = $id";

            $resultado = mysqli_query($conn, $query);

            if (!$resultado) {
                die ('Erro ao deltar: ' . mysqli_error($conn));
            } else {
                echo "<header>Usuário [$id] excluído com sucesso.</header>";
            }
        }
    ?>
</body>
</html>