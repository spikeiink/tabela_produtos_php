<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, categoria_id) 
            VALUES ('$nome', '$preco', '$quantidade', '$descricao', '$categoria_id')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php"); 
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>
