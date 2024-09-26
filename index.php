<!DOCTYPE html>
<html lang="pt-BR">

<html>

<head>
    <title>Cadastro de Produtos</title>
</head>

<body>
    <h1>Cadastro de Produtos</h1>
    <form action="produtos.php" method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="nome<?php echo $i; ?>">Nome do produto <?php echo $i; ?>:</label>
            <input type="text" name="nome<?php echo $i; ?>" required><br>

            <label for="preco<?php echo $i; ?>">Preço do produto <?php echo $i; ?>:</label>
            <input type="number" name="preco<?php echo $i; ?>" step="0.01" required><br><br>
        <?php endfor; ?>

        <input type="submit" value="Enviar">
    </form>
</body>

</html>
