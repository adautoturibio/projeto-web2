<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        print_r($login);
        if($login->nivel == 1){
    
?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>


    <div class="container pt-4 pb-5 bg-light">
        <h2 class="border-bottom border-2 border-primary">
            <?= ucfirst($form).' '.$title ?>
        </h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuarios/'.$op); ?>" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" name="nome" value="<?= $usuarios->nome; ?>"  id="nome">
            </div>

            <div class="mb-3">
                <label for="sobrenome" class="form-label"> Sobrenome </label>
                <input type="text" class="form-control" name="sobrenome" value="<?= $usuarios->sobrenome; ?>"  id="sobrenome">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label"> TeleFone </label>
                <input type="tel" class="form-control" name="telefone" value="<?= $usuarios->telefone; ?>"  id="telefone">
            </div>

            <div class="mb-3">
                <label for="data_nasc" class="form-label"> Data Nasc. </label>
                <input type="date" class="form-control" name="data_nasc" value="<?= $usuarios->data_nasc; ?>"  id="data_nasc">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label"> E-mail </label>
                <input type="email" class="form-control" name="email" value="<?= $usuarios->email; ?>"  id="email">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label"> Senha </label>
                <input type="password" class="form-control" name="senha" value="<?= $usuarios->senha; ?>"  id="senha">
            </div>

            <div class="mb-3">
                <label for="nivel" class="form-label"> Nível </label>
                <select class="form-control" name="nivel" id="nivel">
                    <option value="1" <?= $usuarios->nivel == '1' ? 'selected' : '' ?>>Administrador</option>
                    <option value="0" <?= $usuarios->nivel == '0' ? 'selected' : '' ?>>Usuário</option>
                </select>
            </div>

            <!-- <label for="usuarios_id" class="form-label"> ID </label>
            <input type="hidden" name="usuarios_id" value="< ?= $usuarios->usuarios_id; ?>" > -->

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