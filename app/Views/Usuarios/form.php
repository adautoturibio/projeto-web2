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


    <div class="container pt-4 pb-5 white">
        <h3 class="cor-1t"><b> <?= $title ?></b></h3>
        <hr class="linha">

        <?php if (isset($validation)): ?>
            <div class="card-panel red lighten-4">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuarios/'.$op); ?>" method="post">
            <div class="input-field largura">
                <label for="nome"> Nome </label>
                <input type="text" name="nome" value="<?= $usuarios->nome; ?>" id="nome">
            </div>

            <div class="input-field">
                <label for="sobrenome"> Sobrenome </label>
                <input type="text" name="sobrenome" value="<?= $usuarios->sobrenome; ?>" id="sobrenome">
            </div>

            <div class="input-field">
                <label for="telefone"> Telefone </label>
                <input type="tel" name="telefone" value="<?= $usuarios->telefone; ?>" id="telefone">
            </div>

            <div class="input-field">
                <label for="data_nasc"> Data Nasc. </label>
                <input type="date" name="data_nasc" value="<?= $usuarios->data_nasc; ?>" id="data_nasc">
            </div>
            
            <div class="input-field">
                <label for="email"> E-mail </label>
                <input type="email" name="email" value="<?= $usuarios->email; ?>" id="email">
            </div>

            <div class="input-field">
                <label for="senha"> Senha </label>
                <input type="password" name="senha" value="<?= $usuarios->senha; ?>" id="senha">
            </div>

            <div class="input-field">
                <label for="nivel"> Nível </label>
                <select name="nivel" id="nivel" class="browser-default">
                    <option value="1" <?= $usuarios->nivel == '1' ? 'selected' : '' ?>>Administrador</option>
                    <option value="0" <?= $usuarios->nivel == '0' ? 'selected' : '' ?>>Usuário</option>
                </select>
            </div>

            <div class="input-field">
                <button class="btn green" type="submit"> <?= ucfirst($form) ?> <i class="material-icons">save</i></button>
            </div>
        
        </form>

    </div>

<?= $this->endSection() ?>

<?php 
        }else{

            $data['msg'] = msg("Sem permissão de acesso!", "red-text text-darken-2");
            echo view('login',$data);
        }
    }else{

        $data['msg'] = msg("O usuário não está logado!", "red-text text-darken-2");
        echo view('login',$data);
    }

?>
