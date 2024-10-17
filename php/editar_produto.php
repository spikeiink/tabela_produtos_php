<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php"); 
} else {
    echo "Erro ao excluir: " . mysqli_error($conn);
}
?>
