<?php
    helper('functions');
    session();
    if(isset($_SESSION['login'])){
        $login = $_SESSION['login'];
        if($login->nivel == 1){
    
?>
<?= $this->extend('Templates_admin') ?>
<?= $this->section('content') ?>


    <div class="container">
        
        <h3 class="cor-1t"><b>Bem vindo ao Painel Administrativo!</b></h3>
        <hr class="linha">
        <p></p>


        <div class="col s12 m5 l3">
            
            <!-- CARD DE USUÁRIOS -->
            <div class="card">
                <div class="card-content">
                <span class="card-title"><b>Usuários</b></span>
                    <p>Adicionar ou excluir usuários.</p>
                </div>
                <div class="card-action">
                    <label>
                    <a class="btn white waves-effect black-text" href="<?php echo base_url('/usuarios') ?>">
                        <i class="material-icons">person</i>
                        <b>Acessar</b>
                    </a>
                    </label>
                </div>
            </div>


            <!-- CARD DE CATEGORIAS -->
            <div class="card">
                <div class="card-content">
                <span class="card-title"><b>Categorias</b></span>
                    <p>Adicionar, excluir ou alterar categorias de produtos.</p>
                </div>
                <div class="card-action">
                    <label>
                    <a class="btn white waves-effect black-text" href="<?php echo base_url('/categorias') ?>">
                        <i class="material-icons">description</i>
                        <b>Acessar</b>
                    </a>
                    </label>
                </div>
            </div>


            <!-- CARD DE PRODUTOS -->
            <div class="card">
                <div class="card-content">
                <span class="card-title"><b>Produtos</b></span>
                    <p>Adicionar, excluir ou alterar os produtos.</p>
                </div>
                <div class="card-action">
                    <label>
                    <a class="btn white waves-effect black-text" href="<?php echo base_url('/produtos') ?>">
                        <i class="material-icons">shopping_basket</i>
                        <b>Acessar</b>
                    </a>
                    </label>
                </div>
            </div>


            <!-- CARD DE ALTERAR SENHA -->
            <div class="card">
                <div class="card-content">
                <span class="card-title"><b>Alterar Senha</b></span>
                    <p>Alterar senha dos usuários.</p>
                </div>
                <div class="card-action">
                    <label>
                    <a class="btn white waves-effect black-text" href="<?php echo base_url('/edit_senha') ?>">
                        <i class="material-icons">vpn_key</i>
                        <b>Acessar</b>
                    </a>
                    </label>
                </div>
            </div>

            <!-- CARD DE ALTERAR NÍVEL -->
            <div class="card">
                <div class="card-content">
                <span class="card-title"><b>Alterar Nível</b></span>
                    <p>Alterar nível dos usuários. <p>
                </div>
                <div class="card-action">
                    <label>
                    <a class="btn white waves-effect black-text" href="<?php echo base_url('/edit_nivel') ?>">
                        <i class="material-icons">bar_chart</i>
                        <b>Acessar</b>
                    </a>
                    </label>
                </div>
            </div>


        </div>




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