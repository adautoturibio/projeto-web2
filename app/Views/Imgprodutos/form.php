
<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        if($login->usuarios_nivel == 1){
    
?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>


    <div class="container pt-4 pb-5 bg-light">
        <h2 class="border-bottom border-2 border-primary">
            <?= ucfirst($form).' '.$title ?>
        </h2>

        <?= form_open_multipart('imgprodutos/'.$op)  ?>
            <div class="mb-3">
                <label for="imgprodutos_descricao" class="form-label"> Descrição </label>
                <input type="text" class="form-control" name="imgprodutos_descricao" value="<?= $imgprodutos->imgprodutos_descricao; ?>"  id="imgprodutos_descricao">
            </div>

            <div class="mb-3">
                <label for="imgprodutos_produtos_id" class="form-label"> Upload </label>
                <select class="form-control" name="imgprodutos_produtos_id"  id="imgprodutos_produtos_id">
                    
                    <?php 
                    for($i=0; $i < count($produtos);$i++){ 
                        $selected = '';
                        if($imgprodutos->imgprodutos_produtos_id == $produtos[$i]->produtos_id){
                            $selected = 'selected'; 
                        }
                    ?>
                        <option <?= $selected; ?> value="<?= $produtos[$i]->produtos_id; ?>">
                            <?= $produtos[$i]->produtos_nome; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="imgprodutos_link" class="form-label"> Upload </label>
                <input type="file" class="form-control" name="imgprodutos_link" value="<?= $imgprodutos->imgprodutos_link; ?>"  id="imgprodutos_link">
            </div>

            


            <input type="hidden" name="imgprodutos_id" value="<?= $imgprodutos->imgprodutos_id; ?>" >

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