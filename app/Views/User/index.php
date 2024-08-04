<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        if($login->usuarios_nivel == 0){
    
?>
    <?= $this->extend('Templates_user') ?>
    <?= $this->section('content') ?>
    <div class="container p-5">
        <h1>Usuário</h1>
        <p>
           <?php
            print_r($login);
            ?>
        </p>
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

