<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>LOJA</title>
</head>
<body>
    <h1>CADASTRO DE PRODUTOS</h1>
    
    
    <form action="php/cadastro.php" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br>
        
        <label>Preço:</label><br>
        <input type="number" step="0.01" name="preco" required><br>
        
        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" required><br>
        
        <label>Descrição:</label><br>
        <textarea name="descricao"></textarea><br>
        
        <label>Categoria:</label><br>
        <select name="categoria_id" required>
            
            <?php
            include 'php/conexao.php';
            $sql = "SELECT * FROM categorias";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select><br>
        
        <button type="submit">Cadastrar Produto</button>
    </form>

   
    <h2>Buscar Produtos</h2>
    <input type="text" id="nome_busca" placeholder="Buscar por nome">
    <button class="btn-buscar" onclick="buscarProdutos()">Buscar</button>


    
    <table id="tabela_produtos">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
    <h2>Navegar por Categoria</h2>
<a href="produtos.php" class="nav-link">Ver Produtos por Categoria</a>
</body>
</html>
