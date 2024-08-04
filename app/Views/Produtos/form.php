<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        print_r($login);
        if($login->usuarios_nivel == 1){
    
?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>


    <div class="container pt-4 pb-5 bg-light">
        <h2 class="border-bottom border-2 border-primary">
            <?= ucfirst($form).' '.$title ?>
        </h2>

        <form action="<?= base_url('produtos/'.$op); ?>" method="post">
            <div class="mb-3">
                <label for="produtos_nome" class="form-label"> Produto </label>
                <input type="text" class="form-control" name="produtos_nome" value="<?= $produtos->produtos_nome; ?>"  id="produtos_nome">
            </div>

            <div class="mb-3">
                <label for="produtos_descricao" class="form-label"> Descrição </label>
                <input type="text" class="form-control" name="produtos_descricao" value="<?= $produtos->produtos_descricao; ?>"  id="produtos_descricao">
            </div>

            <div class="mb-3">
                <label for="produtos_preco_custo" class="form-label"> Preço de Custo </label>
                <input type="text" class="form-control" name="produtos_preco_custo" value="<?= moedaReal($produtos->produtos_preco_custo); ?>"  id="produtos_preco_custo">
            </div>

            <div class="mb-3">
                <label for="produtos_preco_venda" class="form-label"> Preço de Venda </label>
                <input type="text" class="form-control" name="produtos_preco_venda" value="<?= moedaReal($produtos->produtos_preco_venda); ?>"  id="produtos_preco_venda">
            </div>

            <div class="mb-3">
                <label for="produtos_categorias_id" class="form-label"> Categoria </label>
                <select class="form-control" name="produtos_categorias_id"  id="produtos_categorias_id">
                    
                    <?php 
                    for($i=0; $i < count($categorias);$i++){ 
                        $selected = '';
                        if($categorias[$i]->categorias_id == $produtos->produtos_categorias_id){
                            $selected = 'selected'; 
                        }
                    ?>
                        <option <?= $selected; ?> value="<?= $categorias[$i]->categorias_id; ?>">
                            <?= $categorias[$i]->categorias_nome; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>

            <input type="hidden" name="produtos_id" value="<?= $produtos->produtos_id; ?>" >

            <div class="mb-3">
                <button class="btn btn-success" type="submit"> <?= ucfirst($form)  ?> <i class="bi bi-floppy"></i></button>
            </div>
        
        </form>

    </div>

<?= $this->endSection() ?>

<?php 
        }else{

            $data['msg'] = msg("Sem permissão de acesso!","danger");
            echo view('login',$data);
        }
    }else{

        $data['msg'] = msg("O usuário não está logado!","danger");
        echo view('login',$data);
    }

?>
