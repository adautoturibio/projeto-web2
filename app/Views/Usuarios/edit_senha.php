<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        if($login->usuarios_nivel == 1){
    
?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>


    <div class="container">
        
        <?php if(isset($msg)){echo $msg;} ?>
        
        <h3 class="cor-1t"><b> <?= $title ?></b></h3>
        <hr class="linha">

        <form action="<?= base_url('usuarios/salvar_senha'); ?>" method="post">

            <div class="input-field">
                <input type="password" name="usuarios_senha_atual" id="usuarios_senha_atual" class="validate">
                <label for="usuarios_senha_atual">Senha Atual</label>
            </div>
            
            <div class="input-field">
                <input type="password" name="usuarios_nova_senha" id="usuarios_nova_senha" class="validate" value="<?= $usuarios->usuarios_nova_senha; ?>">
                <label for="usuarios_nova_senha">Nova Senha</label>
            </div>

            <div class="input-field">
                <input type="password" name="usuarios_confirmar_senha" id="usuarios_confirmar_senha" class="validate" value="<?= $usuarios->usuarios_confirmar_senha; ?>">
                <label for="usuarios_confirmar_senha">Confirma nova senha</label>
            </div>
            
            <input type="hidden" name="usuarios_id" value="<?= $login->usuarios_id; ?>">

            <div class="input-field">
                <button class="btn waves-effect waves-light green" type="submit">
                    Alterar senha
                    <i class="material-icons right">save</i>
                </button>
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
