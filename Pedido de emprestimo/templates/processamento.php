<?php
require_once("../config/conexao.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomecliente = $_POST["nomecliente"];
    $livro = $_POST["livro"];
    $dataemprestimo = $_POST["dataemprestimo"];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO pedidos_emprestimos (nome_cliente, livro, data_emprestimo) VALUES (:nomecliente, :livro, :dataemprestimo)");
        $stmt->bindParam(':nomecliente', $nomecliente);
        $stmt->bindParam(':livro', $livro);
        $stmt->bindParam(':dataemprestimo', $dataemprestimo);        
        $stmt->execute();
        
        echo "Dados inseridos com sucesso no banco de dados.";
    } catch (PDOException $e) {
        echo "Erro ao inserir os dados na tabela: " . $e->getMessage();
    }

    $conn = null;
} else {
    echo "O formulário não foi enviado.";
}
?>