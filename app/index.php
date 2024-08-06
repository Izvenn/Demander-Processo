<?php
require '../vendor/autoload.php';

use App\handlers\ConversionHandler;

$handler = new ConversionHandler();
$resultados = $handler->handleConversion($_POST);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Números</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Conversor de Números</h1>

    <form method="POST">
        <fieldset>
            <legend>Conversão</legend>
            <label for="numero">Número Arábico :</label>
            <input type="number" id="numero" name="numero" min="1">

            <label for="romano">Número Romano :</label>
            <input type="text" id="romano" name="romano" pattern="[IVXLCDMivxlcdm]+" placeholder="Ex.: XI">

            <button type="submit">Converter</button>
        </fieldset>
    </form>

    <?php if (!empty($resultados)) : ?>
        <?php if (isset($resultados['error'])) : ?>
            <p><?= htmlspecialchars($resultados['error'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php else : ?>
            <?php if (isset($resultados['roman'])) : ?>
                <p><?= htmlspecialchars($resultados['roman'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
            <?php if (isset($resultados['arabic'])) : ?>
                <p><?= htmlspecialchars($resultados['arabic'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>
