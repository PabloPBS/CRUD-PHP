<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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

        a {
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
    </style>
</head>
<body>
    <?php 
        include ('conn.php');

        if ($_GET) {
            $id = $_GET['update'];

            $sql = "SELECT * FROM `usuario` WHERE `id_Usuario` = $id";
            $resultado = mysqli_query($conn, $sql);

            echo "<form action='#' method='post' autocomplete='off' id='formu'>";
            echo "<table><tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Sexo</th>
            <th>Data Nasc</th>
            <th></th>
            </tr>";

            while ($rows = mysqli_fetch_object($resultado)) {
                echo '<tr>';
                echo '<td>' . $rows->id_Usuario . '</td>';
                echo "<td><input type='name' name='nome' placeholder='$rows->nome_Usuario'></td>";
                echo "<td><input type='email' name='email' placeholder='$rows->email_Usuario'></td>";
                echo "<td><input type='password' name='senha' placeholder='$rows->senha_Usuario'></td>";
                echo "<td><select name ='sexo' id='sexo' form='formu'>
                    <option value='Masculino'>Masculino</option>
                    <option value='Feminino'>Feminino</option>
                    <option value='Outro'>Outro</option>
                    </select>
                    </td>";
                echo "<td><input type='date' name='dataNasc' placeholder='$rows->nasc_Usuario'></td>";
                echo "<td><button type='submit'>Salvar</td>";
                echo '</tr></form>';

                $id = $rows->id_Usuario;
                $nam = $rows->nome_Usuario;
                $ema = $rows->email_Usuario;
                $sen = $rows->senha_Usuario;
                $sex = $rows->sexo_Usuario;
                $nas = $rows->nasc_Usuario;
            }

            if ($_POST) {
                $nome = $_POST['nome'];
                empty($nome) ? $nome = $nam : null;
                
                $email = $_POST['email'];
                empty($email) ? $email = $ema : null;

                $senha = $_POST['senha'];
                empty($senha) ? $senha = $sen : null;

                $sexo = $_POST['sexo'];
                empty($sexo) ? $sexo = $sex : null;

                $nasc = $_POST['dataNasc'];
                empty($nasc) ? $nasc = $nas : null;

                $sql = "UPDATE `usuario` SET `nome_Usuario`='$nome',`email_Usuario`='$email',`senha_Usuario`='$senha',`sexo_Usuario`='$sexo',`nasc_Usuario`='$nasc' WHERE id_Usuario = $id";
                $resultado = mysqli_query($conn, $sql);
                if (!$resultado) {
                    die ('Erro em atualizar dados: ' . mysqli_error($conn));
                } else {
                    echo 'Dados atualizados com sucesso!';
                }
            }
        }

        mysqli_close($conn);
?>

<a href="index.php">Voltar para a página inicial</a>
</body>
</html>

