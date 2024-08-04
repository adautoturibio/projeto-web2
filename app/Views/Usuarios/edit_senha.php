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
            Alterar Senha
        </h2>

        <form action="<?= base_url('usuarios/salvar_senha'); ?>" method="post">

        <div class="mb-3">
                <label for="usuarios_senha_atual" class="form-label"> Senha Atual </label>
                <input type="password" class="form-control" name="usuarios_senha_atual"  
                id="usuarios_senha_atual">
            </div>
            
            <div class="mb-3">
                <label for="usuarios_nova_senha" class="form-label"> Nova Senha </label>
                <input type="password" class="form-control" name="usuarios_nova_senha"  
                value="<?= $usuarios->usuarios_nova_senha; ?>" id="usuarios_nova_senha">
            </div>

            <div class="mb-3">
                <label for="usuarios_confirmar_senha" class="form-label"> Confirma nova senha </label>
                <input type="password" class="form-control" name="usuarios_confirmar_senha"
                value="<?= $usuarios->usuarios_confirmar_senha; ?>"  id="usuarios_confirmar_senha">
            </div>
            
            <input type="hidden" name="usuarios_id" value="<?= $login->usuarios_id; ?>" >

            <div class="mb-3">
                <button class="btn btn-success" type="submit"> Alterar senha <i class="bi bi-floppy"></i></button>
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