<?php
include 'conexao.php';

$id = $_POST['id'] ?? '';

if ($id) {
    $sql = "DELETE FROM produtos WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao excluir o produto.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID não fornecido.']);
}
?>
