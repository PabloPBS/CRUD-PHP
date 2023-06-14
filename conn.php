<?php 
    define ('SERVERNAME', 'localhost');
    define ('USERNAME', 'root');
    define ('PASSWORD', '');
    define ('DBNAME', 'cadastroform');

    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

    if (mysqli_error($conn)) {
        die ('Erro na conexão: ' + mysqli_connect_error());
    }
?>