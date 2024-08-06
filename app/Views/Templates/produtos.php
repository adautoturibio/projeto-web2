 <?= $this->extend('index.php') ?>
 <?= $this->section('content') ?>

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
                <?php if($produto->categorias_id == 1):?>
                <div class="col s12 m7 l4">
                    <div class="card">
                    
                        <div class="card-image">
                            <img src="<?= $produto->img?>">
                            
                            <span class="card-title"><b><?=esc($produto->nome)?></b></span>
                        </div>
                        <div class="card-content">
                        <span class="card-title"><b><?= esc("R$ ".$produto->preco_venda) ?></b></span>
                            <p><?= esc($produto->descricao)?></p>
                        </div>
                        <div class="card-action">
                            <a href="#">Botão</a>
                        </div>
                    </div>
                </div>
               <?php endif;?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
    

<!-- [NOTA] A sessão de bebidas foi feita sem tentar puxar do banco e sem o foreach, para que o restante
do grupo possa vizualizar como ficará o card. É assim que ficará quando der certo puxando do banco. -->

        <h2 class="cor-1t"><b>Bebidas</b></h2>
        <hr class="linha">

        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
            <?php if($produto->categorias_id == 2):?>
            <div class="row">
                <div class="col s12 m7 l4">
                    <div class="card">
                        <div class="card-image">
                        <img src="<?= $produto->img?>">
                            <span class="card-title"><b><?=esc($produto->nome)?></b></span>
                        </div>
                        <div class="card-content">
                            <span class="card-title"><b><?= esc("R$ ".$produto->preco_venda) ?></b></span>
                            <p><?= esc($produto->descricao)?></p>
                        </div>
                        <div class="card-action">
                            <a href="#">Botão</a>
                        </div>
                    </div>
                </div>

            </div>
            <?php endif;?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
    
    </div>
<?= $this->endSection() ?>
<!--Fecha Produtos-->