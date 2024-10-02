<!-- montagem.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome'])) {
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
    } else {
        //Se não houver o valor nome força o usuario voltar ao formulário anterior.
        header('Location: login.php');
        exit();
    }
} else {
    //Se não houver algum POST força o usuário a voltar para o formulário anterior.
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montagem de Equipamento</title>
    <style>
        .produto-container {
            display: inline-block;
            text-align: center;
            margin: 10px;
        }
        .produto-container img {
            width: 200px;
            height: 200px;
            display: block;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <h2>Ola <?php echo $nome; ?>, voce deseja obter informacoes de quais produtos?</h2>

    <form action="escolhas.php" method="POST">
        <input type="hidden" name="nome" value="<?php echo $nome; ?>">

        <div class="produto-container">
            <img src="imagens/note-icon.png" alt="Notebook">
            <button type="submit" name="produto" value="Notebook">Notebook</button>
        </div>

        <div class="produto-container">
            <img src="imagens/cpu-icon.png" alt="Desktop">
            <button type="submit" name="produto" value="Desktop">Desktop</button>
        </div>
    </form>
</body>
</html>