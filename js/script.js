function buscarProdutos() {
    const nome = document.getElementById('nome_busca').value;
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `php/busca_produtos.php?nome=${nome}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const produtos = JSON.parse(xhr.responseText);
            let tabela = '';
            produtos.forEach(produto => {
                tabela += `<tr>
                    <td>${produto.nome}</td>
                    <td>${produto.preco}</td>
                    <td>${produto.quantidade}</td>
                    <td>${produto.categoria}</td>
                    <td>
                        <a href="php/editar_produto.php?id=${produto.id}">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="excluirProduto(${produto.id})">Excluir</button>
                    </td>
                </tr>`;
            });
            document.querySelector('#tabela_produtos tbody').innerHTML = tabela;
        }
    }
    xhr.send();
}

function excluirProduto(id) {
    // Verifica se o ID foi fornecido
    if (!id) {
        alert('ID do produto não fornecido.');
        return;
    }

    // Confirmação antes de excluir
    if (confirm('Você tem certeza que deseja excluir este produto?')) {
        fetch('php/excluir_produto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + encodeURIComponent(id) // Passa o ID para o PHP
        })
        .then(response => {
            if (response.ok) {
                alert('Produto excluído com sucesso!');
                buscarProdutos(); // Atualiza a lista de produtos
            } else {
                alert('Erro ao excluir o produto.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao excluir o produto.');
        });
    }
}


