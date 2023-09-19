<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova IWD</title>
    <link rel="stylesheet" href="http://localhost:5500/styles/style.css">
</head>
<body>
    <header class="header">
        <h1>Sistema de Cadastro de Músicas</h1>
    </header>
    <nav class="nav">
        <a href="http://localhost:5500">Cadastrar Música</a>
        <a href="#Listar">Listar Músicas</a>
    </nav>
    <div class="musicas">
        <div>
            <h1>Músicas Cadastradas:</h1><br>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
            
            $hostname = "localhost"; 
            $user = "root";
            $password = "ifsp";
            $database = "discoteca";
            
            $conn = mysqli_connect($hostname, $user, $password, $database);
            
            $query = "select * from musicas";

            $res = mysqli_query($conn, $query);

            if (!$conn) {
                die("Conexão falhou: " . mysqli_connect_error());
            }

            while($rows=$res->fetch_assoc()) {
            ?>
                <h2><?php echo $rows['id'] . '. ' . $rows['nome'] . ' - ' . $rows['ano']; ?></h2><br>
            <?php
            }
            ?>
        </div>
    </div>
    <footer class="footer">
        <h4>Desenvolvido por Pedro Betti</h4>
    </footer>
</body>
</html>