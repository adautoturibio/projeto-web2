<!--Abre Produtos-->
<div id="produtos" class="container">

    <h2 class="cor-1t"><b>Produtos</b></h2>
    <hr class="linha">

    <?php
    // código para exibir o erro na tela (debug)
    // se comentar esse bloco de código php, é possível ver a página
    echo '<pre>';
    print_r($produtos);
    echo '</pre>';
    ?>

    <?php if (!empty($produtos)): ?>
        <div class="row">
            <?php foreach ($produtos as $produto): ?>
                <div class="col s12 m7 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/imagens/burguer2.jpg">
                            <span class="card-title"><?= esc($produto->nome) ?></span>
                        </div>
                        <div class="card-content">
                            <p><?= esc($produto->descricao) ?></p>
                        </div>
                        <div class="card-action">
                            <a href="#">Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
    


</div>

<!--Fecha Produtos-->