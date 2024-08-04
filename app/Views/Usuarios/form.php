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

        <form action="<?= base_url('usuarios/'.$op); ?>" method="post">
            <div class="mb-3">
                <label for="usuarios_nome" class="form-label"> Nome </label>
                <input type="text" class="form-control" name="usuarios_nome" value="<?= $usuarios->usuarios_nome; ?>"  id="usuarios_nome">
            </div>

            <div class="mb-3">
                <label for="usuarios_sobrenome" class="form-label"> Sobrenome </label>
                <input type="text" class="form-control" name="usuarios_sobrenome" value="<?= $usuarios->usuarios_sobrenome; ?>"  id="usuarios_sobrenome">
            </div>

            <div class="mb-3">
                <label for="usuarios_cpf" class="form-label"> CPF </label>
                <input type="text" class="form-control" name="usuarios_cpf" value="<?= $usuarios->usuarios_cpf; ?>"  id="usuarios_cpf">
            </div>

            <div class="mb-3">
                <label for="usuarios_email" class="form-label"> E-mail </label>
                <input type="email" class="form-control" name="usuarios_email" value="<?= $usuarios->usuarios_email; ?>"  id="usuarios_email">
            </div>

            <div class="mb-3">
                <label for="usuarios_senha" class="form-label"> Senha </label>
                <input type="password" class="form-control" name="usuarios_senha" value="<?= $usuarios->usuarios_senha; ?>"  id="usuarios_senha">
            </div>

            <div class="mb-3">
                <label for="usuarios_fone" class="form-label"> Fone </label>
                <input type="tel" class="form-control" name="usuarios_fone" value="<?= $usuarios->usuarios_fone; ?>"  id="usuarios_fone">
            </div>

            <div class="mb-3">
                <label for="usuarios_data_nasc" class="form-label"> Data Nasc. </label>
                <input type="date" class="form-control" name="usuarios_data_nasc" value="<?= $usuarios->usuarios_data_nasc; ?>"  id="usuarios_data_nasc">
            </div>

            <input type="hidden" name="usuarios_id" value="<?= $usuarios->usuarios_id; ?>" >

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