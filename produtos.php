<?php

function capturarDadosProdutos($dados) {
    $produtos = [];

    for ($i = 1; $i <= 5; $i++) {
        $nome = $dados["nome$i"];
        $preco = floatval($dados["preco$i"]);

        $produtos[] = ["nome" => $nome, "preco" => $preco];
    }

    return $produtos;
}

function contarProdutosAbaixo50($produtos) {
    $contagem = 0;

    foreach ($produtos as $produto) {
        if ($produto['preco'] < 50.00) {
            $contagem++;
        }
    }

    return $contagem;
}

function listarProdutosEntre50e100($produtos) {
    $produtosFiltrados = [];

    foreach ($produtos as $produto) {
        if ($produto['preco'] >= 50.00 && $produto['preco'] <= 100.00) {
            $produtosFiltrados[] = $produto['nome'];
        }
    }

    return $produtosFiltrados;
}

function calcularMediaPrecoAcima100($produtos) {
    $soma = 0;
    $quantidade = 0;

    foreach ($produtos as $produto) {
        if ($produto['preco'] > 100.00) {
            $soma += $produto['preco'];
            $quantidade++;
        }
    }

    if ($quantidade > 0) {
        return $soma / $quantidade;
    } else {
        return 0; // Retorna 0 se não houver produtos acima de R$100,00
    }
}


$produtos = capturarDadosProdutos($_POST);

$produtosAbaixo50 = contarProdutosAbaixo50($produtos);
echo "Quantidade de produtos com preço inferior a R$50,00: " . $produtosAbaixo50 . "<br>";

$produtosEntre50e100 = listarProdutosEntre50e100($produtos);
if (!empty($produtosEntre50e100)) {
    echo "Produtos com preço entre R$50,00 e R$100,00: " . implode(", ", $produtosEntre50e100) . "<br>";
} else {
    echo "Nenhum produto com preço entre R$50,00 e R$100,00.<br>";
}

$mediaPrecoAcima100 = calcularMediaPrecoAcima100($produtos);
if ($mediaPrecoAcima100 > 0) {
    echo "Média dos preços dos produtos com preço superior a R$100,00: R$" . number_format($mediaPrecoAcima100, 2) . "<br>";
} else {
    echo "Não há produtos com preço superior a R$100,00.<br>";
}
?>