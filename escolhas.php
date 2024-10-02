<?php
// Resgata os valores que estão sendo encaminhados no ultimo <form> via POST
if (isset($_POST['nome']) AND isset($_POST['produto'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $produto = htmlspecialchars($_POST['produto']);
} else {
    echo "Erro: Produto não foi definido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolhas para <?php echo htmlspecialchars($produto); ?></title>
</head>
<body>
    <h2>Montagem do seu <?php echo htmlspecialchars($produto); ?></h2>
    <form action="resumo.php" method="POST">
        
        <input type="hidden" name="nome" value="<?php echo htmlspecialchars ($nome);?>">
        <input type="hidden" name="produto" value="<?php echo htmlspecialchars($produto); ?>">

        <!-- Escolhas comuns para CPU, memoria, armazenamento e SO -->
        <h3>Escolha a CPU:</h3>
        <select name="cpu" required>
            <option value="Intel i5">Intel i5 - R$ 1200</option>
            <option value="Intel i7">Intel i7 - R$ 1500</option>
            <option value="AMD Ryzen 5">AMD Ryzen 5 - R$ 1100</option>
            <option value="AMD Ryzen 7">AMD Ryzen 7 - R$ 1400</option>
        </select>

        <h3>Escolha a Memória:</h3>
        <select name="memoria" required>
            <option value="8GB">8GB - R$ 400</option>
            <option value="16GB">16GB - R$ 700</option>
            <option value="32GB">32GB - R$ 1200</option>
            <option value="64GB">64GB - R$ 2000</option>
        </select>

        <h3>Escolha o Armazenamento:</h3>
        <select name="armazenamento" required>
            <option value="HDD 1TB">HDD 1TB - R$ 300</option>
            <option value="SSD 256GB">SSD 256GB - R$ 500</option>
            <option value="SSD 512GB">SSD 512GB - R$ 800</option>
            <option value="SSD 1TB">SSD 1TB - R$ 1200</option>
        </select>

        <h3>Escolha o Sistema Operacional:</h3>
        <select name="so" required>
            <option value="Windows 10">Windows 10 - R$ 500</option>
            <option value="Linux">Linux - Grátis</option>
        </select>

        <!-- Verificação do valor de $produto -->
        <?php
        // Se for Desktop, mostra as opcoes de monitor
        if ($produto == "Desktop") { ?>
            <h3>Escolha o Monitor:</h3>
            <select name="monitor" required>
                <option value="Monitor 21'">Monitor 21' - R$ 600</option>
                <option value="Monitor 24'">Monitor 24' - R$ 800</option>
                <option value="Monitor 27'">Monitor 27' - R$ 1000</option>
                <option value="Monitor 32'">Monitor 32' - R$ 1200</option>
            </select>
        <?php
        } elseif ($produto == "Notebook") { ?>
            <h3>Escolha a Tela:</h3>
            <select name="tela" required>
                <option value="Tela 13'">Tela 13' - R$ 500</option>
                <option value="Tela 15'">Tela 15' - R$ 700</option>
                <option value="Tela 17'">Tela 17' - R$ 900</option>
            </select>
        <?php } else { ?>
            <p>Produto desconhecido, por favor selecione Desktop ou Notebook.</p>
        <?php } ?>

        <button type="submit">Finalizar Montagem</button>
    </form>
</body>
</html>