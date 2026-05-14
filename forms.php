<?php
// Esta parte do código vai dentro do arquivo HTML, entre as tags PHP <?php  e  ?> , conforme mostrado acima.

$servername = "localhost"; // Geralmente "localhost" ou o endereço do servidor
$username = "root";    // Seu nome de usuário do MySQL
$password = "";    // Sua senha do MySQL
$dbname = "testeasc2";    // O nome do seu banco de dados
$tabela = "sorteios";    // O nome da sua tabela

// Verifica se o botão "Consultar" foi clicado
if (isset($_POST['consultar'])) {
    $id = $_POST['id'];

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para evitar SQL Injection (IMPORTANTE!)
    $sql = $conn->prepare("SELECT numero1, numero2, numero3, numero4 FROM $tabela WHERE id = ?");
    $sql->bind_param("i", $id); // "i" indica que o parâmetro é um inteiro

    // Executa a consulta
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Exibe os dados
        $row = $result->fetch_assoc();
        echo "<div class='resultado'>";
        echo "Número 1: " . $row["numero1"] . "<br>";
        echo "Número 2: " . $row["numero2"] . "<br>";
        echo "Número 3: " . $row["numero3"] . "<br>";
        echo "Número 4: " . $row["numero4"] . "<br>";
        echo "</div>";
    } else {
        echo "<p>Nenhum resultado encontrado para o ID: " . $id . "</p>";
    }

    $conn->close(); // Fecha a conexão
}

?>