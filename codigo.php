<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador Numérico</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Analisador de Propriedades Numéricas</h1>
    <p class="introducao">Digite um número inteiro e descubra suas características:</p>
    
    <form method="post">
        <label for="numero">Insira o número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Verificar</button>
    </form>

    <?php
    // 🟢 MELHORIA: Removido o 'global $num;' desnecessário.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // 🟢 MELHORIA DE SEGURANÇA: Sanitiza a entrada
        $input_num = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);

        // Validação: Garante que o valor é um número válido antes de processar
        if (!is_numeric($input_num) && !empty($_POST['numero'])) {
            echo "<p class='erro'>Erro: Por favor, insira um número inteiro válido.</p>";
        } elseif (is_numeric($input_num)) {
            $num = (int)$input_num;

            // 🟢 MELHORIA VISUAL: Container para os resultados
            echo "<div class='resultado-box'>";
            echo "<h2>Resultados para: " . htmlspecialchars($num) . "</h2>";
        
            // Condição se o número é par ou ímpar
            if ($num % 2 == 0) {
                echo "<p>✅ O número inserido é: <strong>par.</strong></p>";
            } else {
                echo "<p>❌ O número inserido é: <strong>ímpar.</strong></p>";
            }

            // Condição se o número é redondo ou não
            if ($num % 10 == 0) {
                echo "<p>⭕ O número inserido é: <strong>redondo.</strong></p>";
            } else {
                echo "<p>🔸 O número inserido: <strong>não é redondo.</strong></p>";
            }

            // Condição se o número é positivo, negativo ou neutro
            if ($num > 0) {
                echo "<p>⬆️ O número inserido é: <strong>positivo.</strong></p>";
            } elseif ($num < 0) {
                echo "<p>⬇️ O número inserido é: <strong>negativo.</strong></p>";
            } else {
                echo "<p>↔️ O número inserido é: <strong>neutro (zero).</strong></p>";
            }
            
            echo "</div>";
        }
    }
    ?>
</body>

</html>