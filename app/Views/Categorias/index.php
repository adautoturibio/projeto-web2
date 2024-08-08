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

    <div class="container">

        <h3 class="cor-1t"><b> <?= $title ?></b></h3>
        <hr class="linha">

        <?php if(isset($msg)){echo $msg;} ?>

        <form action="<?= base_url('categorias/search'); ?>" class="input-field" role="search" method="post">
            <div class="input-field">
                <input id="search" name="pesquisar" type="search" class="validate" placeholder="Pesquisar">
                <label class="label-icon" for="search"><i class="material-icons right">search</i></label>
                <button class="btn waves-effect waves-light green" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>

        <table class="highlight">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>
                        <a class="btn waves-effect waves-light green" href="<?= base_url('categorias/new'); ?>">
                            Novo
                            <i class="material-icons">add_circle</i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <!-- Aqui vai o laço de repetição -->
                <?php for($i=0; $i < count($categorias); $i++){ ?>
                    <tr>
                        <td><?= $categorias[$i]->categorias_id; ?></td>
                        <td><?= $categorias[$i]->nome; ?></td>
                        <td>
                            <a class="btn waves-effect waves-light blue" href="<?= base_url('categorias/edit/'.$categorias[$i]->categorias_id); ?>">
                                Editar
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="btn waves-effect waves-light red" href="<?= base_url('categorias/delete/'.$categorias[$i]->categorias_id); ?>">
                                Excluir
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>
<br><br><br><br>
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
