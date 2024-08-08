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

    <?php if(isset($msg)){echo $msg;} ?>

    <h3 class="cor-1t"><b>Alterar Nível de Acesso</b></h3>
    <hr class="linha">

    <form action="<?= base_url('usuarios/salvar_nivel'); ?>" method="post">

       <!-- select usuário -->
        <div class="input-field">
            <select name="usuarios_id" id="usuarios_id">
                <?php 
                    for($i=0; $i < count($usuarios);$i++){ 
                        $selected = '';
                        if($usuarios[$i]->usuarios_id == $login->usuarios_id){
                            $selected = 'selected'; 
                        }
                    ?>
                <option <?= $selected; ?> value="<?= $usuarios[$i]->usuarios_id; ?>">
                    <?= $usuarios[$i]->nome.' '.$usuarios[$i]->sobrenome; ?>
                </option>
                <?php } ?>
            </select>
            <label for="usuarios_id">Usuário</label>
        </div>
        
        <!-- select nível -->
        <div class="input-field">
            <select name="usuarios_nivel" id="usuarios_nivel">
                <?php 
                    for($i=0; $i < count($nivel);$i++){ 
                        $selected = '';
                        if($login->nivel == $nivel[$i]['id']){
                            $selected = 'selected'; 
                        }
                    ?>
                <option <?= $selected; ?> value="<?= $nivel[$i]['id']; ?>">
                    <?= $nivel[$i]['nivel']; ?>
                </option>
                <?php } ?>
            </select>
            <label for="usuarios_nivel">Nível</label>
        </div>

        <div class="input-field">
            <button class="btn waves-effect waves-light green" type="submit">
                Alterar nível
                <i class="material-icons right">save</i>
            </button>
        </div>

    </form>

</div>
<br><br><br><br><br><br>

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
