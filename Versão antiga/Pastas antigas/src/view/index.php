<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburgeria Brasil Total</title>
    <link rel="stylesheet" href="../css/css/materialize.css">
    <link rel="stylesheet" href="../css/css/style.css">
</head>
<body>
    <?php 
    // incluindo o arquvio da navbar que pode ser encontrado na pasta template
        require_once __DIR__."/../templeate/nav.php"; 
    ?>
    <main>
        <h2>Hamburger</h2>
        <hr>
        <section>
            <img src="../IMAGENS(TESTE)/hamburguer-de-carne-fresca-isolado-em-fundo-transparente_191095-9018.JPG" alt="Hamburger">
            <h3>X-tudo</h3>
            <span>
                <p>Pão Brioxe, Carne 120mg, bacon, ovo, cheddar, alface, molho da casa</p>
                <button class="menos">-</button>
                <p id="menos">1</p>
                <button class="mais">+</button>
            </span>
        </section>
    </main>
</body>
</html>