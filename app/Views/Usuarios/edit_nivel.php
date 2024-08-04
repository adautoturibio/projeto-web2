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

    <?php if(isset($msg)){echo $msg;} ?>

    <h2 class="border-bottom border-2 border-primary">
        Alterar Nível de acesso
    </h2>

    <form action="<?= base_url('usuarios/salvar_nivel'); ?>" method="post">

       <!-- select usuário -->
        <div class="mb-3">
            <label for="usuarios_id" class="form-label"> Usuario </label>
            <select class="form-control" name="usuarios_id" id="usuarios_id">

                <?php 
                    for($i=0; $i < count($usuarios);$i++){ 
                        $selected = '';
                        if($usuarios[$i]->usuarios_id == $login->usuarios_id){
                            $selected = 'selected'; 
                        }
                    ?>
                <option <?= $selected; ?> value="<?= $usuarios[$i]->usuarios_id; ?>">
                    <?= $usuarios[$i]->usuarios_nome.' '.$usuarios[$i]->usuarios_sobrenome; ?>
                </option>
                <?php } ?>

            </select>
        </div>
        
        <!-- select nivel -->
        <div class="mb-3">
            <label for="usuarios_nivel" class="form-label"> Nivel </label>
            <select class="form-control" name="usuarios_nivel" id="usuarios_nivel">
            <?php 
                    for($i=0; $i < count($nivel);$i++){ 
                        $selected = '';
                        if($login->usuarios_nivel == $nivel[$i]['id']){
                            $selected = 'selected'; 
                        }
                    ?>
                <option <?= $selected; ?> value="<?= $nivel[$i]['id']; ?>">
                    <?= $nivel[$i]['nivel']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit"> Alterar nível <i class="bi bi-floppy"></i></button>
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