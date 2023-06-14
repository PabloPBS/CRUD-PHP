<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <style>
        body {
            background-color: lightskyblue;
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            justify-items: center;
            width: 500px;
            padding: 20px;
            border-radius: 5px;
            gap: 10px;
            background-color: rgba(0, 0, 0, .2);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.3em;
        }

        form > label {
            font-weight: bold;
            margin: 5px 0px;
        }

        form > input {
            padding: 5px;
            border-radius: 3px;
            border: none;
        }

        form > input[type=submit] {
            margin-top: 10px;
            background-color: green;
            padding: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        form > input[type=submit]:hover {
            background-color: rgba(0, 0, 0, .2);
        }

        a {
            color: black;
            text-decoration: none;
            border: 1px solid black;
            padding: 10px;
            background-color: white;
            margin-top: 10px;
        }
    </style>
</head>
<body>
        <form action="#" method="get">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" autocomplete="name" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  autocomplete="email" required>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" autocomplete="new-password" required>
            <label for="sexo">Sexo</label>
            <div>
                <input type="radio" name="sexo" id="sexo" value="Masculino" required>Masculino
                <input type="radio" name="sexo" id="sexo" value="Feminino">Feminino
                <input type="radio" name="sexo" id="sexo" value="Outro">Outro
            </div>
            <label for="dataNasc">Data de Nascimento</label>
            <input type="date" name="dataNasc" id="dataNasc" required>
            <input type="submit" value="Confirmar">
        </form>

        <a href="read.php" rel='aside'>Retornar a tela incial</a>
    <?php 
        include 'conn.php';

        if ($_GET) {
            $nome = $_GET['nome'];
            $email = $_GET['email'];
            $senha = $_GET['senha'];
            $sexo = $_GET['sexo'];
            $dataNasc = $_GET['dataNasc'];

            $query = "INSERT INTO `usuario`(`nome_Usuario`, `email_Usuario`, `senha_Usuario`, `sexo_Usuario`, `nasc_Usuario`) VALUES ('$nome','$email','$senha','$sexo','$dataNasc')";

            $resultado = mysqli_query($conn, $query);

            if (!$resultado) {
                die ('Erro ao inserir usuário: ' + mysqli_error($conn));
            } else {
                echo 'Usuário inserido com sucesso!';
            }
        }
    ?>
</body>
</html>
