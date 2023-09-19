<?php
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$ano = $_POST['ano'];

if(strlen($nome) >= 1 && strlen($nome) <= 50) {
    if($ano >= 1000 && $ano <= 9999) {
        $hostname = "localhost"; 
        $user = "root";
        $password = "ifsp";
        $database = "discoteca";

        $conn = mysqli_connect($hostname, $user, $password, $database);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }
        echo "Conexão feita com sucesso";

        $query = "insert into musicas (nome, ano) values ('$nome', '$ano')";

        $res = mysqli_query($conn, $query);

        if($res) {
            echo '<h2>Questão incluída com sucesso!!!</h2>';
        } 
        else {
            echo '<h2>Questão não incluída!!!</h2>';
            var_dump(mysqli_error($conn));
        }
        mysqli_close($conn);
        header('Location: http://localhost:5500');
        exit();
    }
}

echo "<hr>Ocorreu um erro no cadastro do usuário<br>";
echo "-> Garanta que o nome possui entre 1 e 50 caracteres<br>";
echo "-> Garanta que o ano possua 4 alagarismos<br><hr>";
echo "<button onclick='history.go(-1);'>Retornar</button>";
?>