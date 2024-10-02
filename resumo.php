<!-- resumo.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $produto = htmlspecialchars($_POST['produto']);
    $cpu = htmlspecialchars($_POST['cpu']);
    $memoria = htmlspecialchars($_POST['memoria']);
    $armazenamento = htmlspecialchars($_POST['armazenamento']);
    $so = htmlspecialchars($_POST['so']);
    $monitor = isset($_POST['monitor']) ? $_POST['monitor'] : null;

    // Valores das pecas
    $valores = [
        "Intel i5" => 1200, "Intel i7" => 1500, "AMD Ryzen 5" => 1100, "AMD Ryzen 7" => 1400,
        "8GB" => 400, "16GB" => 700, "32GB" => 1200, "64GB" => 2000,
        "HDD 1TB" => 300, "SSD 256GB" => 500, "SSD 512GB" => 800, "SSD 1TB" => 1200,
        "Windows 10" => 500, "Linux" => 0,
        "Monitor 21'" => 600, "Monitor 24'" => 800, "Monitor 27'" => 1000, "Monitor 32'" => 1200
    ];

    // Calcula o valor total
    $valorTotal = $valores[$cpu] + $valores[$memoria] + $valores[$armazenamento] + $valores[$so];
    if ($monitor) {
        $valorTotal += $valores[$monitor];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo da Montagem</title>
</head>
<body>
    <h2>Resumo da Montagem de <?php echo $nome; ?></h2>
    <p>Produto: <?php echo $produto; ?></p>
    <p>CPU: <?php echo $cpu; ?></p>
    <p>Memória: <?php echo $memoria; ?></p>
    <p>Armazenamento: <?php echo $armazenamento; ?></p>
    <p>Sistema Operacional: <?php echo $so; ?></p>
    <?php if ($monitor) { ?>
        <p>Monitor: <?php echo $monitor; ?></p>
    <?php } ?>
    <h3>Valor Total: R$ <?php echo number_format($valorTotal, 2, ',', '.'); ?></h3>
</body>
</html>