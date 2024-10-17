<?php
include 'php/conexao.php'; 


$sql = "SELECT * FROM categorias";
$result = mysqli_query($conn, $sql);
$categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);


$produtos = [];
if (isset($_GET['categoria_id'])) {
    $categoria_id = intval($_GET['categoria_id']);
    $sql_produtos = "SELECT p.*, c.nome AS categoria FROM produtos p 
                     JOIN categorias c ON p.categoria_id = c.id 
                     WHERE p.categoria_id = $categoria_id";
    $result_produtos = mysqli_query($conn, $sql_produtos);
    $produtos = mysqli_fetch_all($result_produtos, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por Categoria</title>
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <h1>PRODUTOS POR CATEGORIA</h1>

    
    <h2>ESCOLHA UMA CATEGORIA</h2>
<ul class="categoria-list">
    <?php foreach ($categorias as $categoria): ?>
        <li>
            <a class="nav-link" href="produtos.php?categoria_id=<?php echo $categoria['id']; ?>">
                <?php echo $categoria['nome']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


    
    <?php if (!empty($produtos)): ?>
        <h2>Produtos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                        <td><?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo $produto['quantidade']; ?></td>
                        <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum produto encontrado para esta categoria.</p>
    <?php endif; ?>
    <a href="index.php" class="nav-link">PáGINA PRINCIPAL</a>
</body>
</html>
