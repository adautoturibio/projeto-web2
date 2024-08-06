<!--Abre Produtos-->
<div id="produtos" class="container">

    <h2 class="cor-1t"><b>Hambúrgeres</b></h2>
    <hr class="linha">

    <?php
    // código para exibir o erro na tela (debug)
    // se comentar esse bloco de código php, é possível ver a página
    // echo '<pre>';
    // print_r($produtos);
    // echo '</pre>';
    // ?>

    <?php if (!empty($produtos)): ?>
        <div class="row">
            <?php foreach ($produtos as $produto): ?>
                <div class="col s12 m7 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/imagens/burguer2.jpg">
                            <span class="card-title"><b><?= esc($produto->nome) ?></b></span>
                        </div>
                        <div class="card-content">
                            <p><?= esc($produto->descricao) ?></p>
                        </div>
                        <div class="card-action">
                            <a href="#">Botão</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
    

<!-- [NOTA] A sessão de bebidas foi feita sem tentar puxar do banco e sem o foreach, para que o restante
do grupo possa vizualizar como ficará o card. É assim que ficará quando der certo puxando do banco. -->


    <h2 class="cor-1t"><b>Bebidas</b></h2>
    <hr class="linha">

   
        <div class="row">
            <div class="col s12 m7 l4">
                <div class="card">
                    <div class="card-image">
                        <img src="assets/imagens/suco.png">
                        <span class="card-title"><b>Suco de Laranja</b></span>
                    </div>
                    <div class="card-content">
                         <p>Copo 500ml.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Botão</a>
                    </div>
                </div>
            </div>

        </div>
</div>

<!--Fecha Produtos-->