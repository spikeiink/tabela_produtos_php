<?php
include 'conexao.php';

$nome = $_GET['nome'] ?? '';

$sql = "SELECT p.*, c.nome AS categoria FROM produtos p 
        JOIN categorias c ON p.categoria_id = c.id
        WHERE p.nome LIKE '%$nome%'";

$result = mysqli_query($conn, $sql);
$produtos = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($produtos);
?>
