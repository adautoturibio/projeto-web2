<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        if($login->nivel == 1){
?>

<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>

<div class="container" style="padding-top: 2rem; padding-bottom: 3rem;">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="#" class="breadcrumb">Admin</a>
                <a href="#" class="breadcrumb">Home</a>
                <a class="breadcrumb" aria-current="page">Data</a>
                <span class="breadcrumb"> / Seja bem-vindo <?= $login->nome ?></span>
            </div>
        </div>
    </nav>
    <h2 class="section">
        Administrador
    </h2>
    <div>
        <?php
            print_r($login); // estilizar
        ?>
    </div>
</div>

<?= $this->endSection() ?>

<?php 
        } else {
            $data['msg'] = msg("Sem permissão de acesso!", "danger");
            echo view('login', $data);
        }
    } else {
        $data['msg'] = msg("O usuário não está logado!", "danger");
        echo view('login', $data);
    }
?>
