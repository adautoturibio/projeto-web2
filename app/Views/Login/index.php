<div class="container">
    <div class="row" style="margin-top: 3rem;">
        <div class="col s12 m8 l6 offset-m2 offset-l3">
            <div class="card">
                <div class="card-content">
                    <div class="center-align">
                        <?php if (isset($msg)) { echo $msg; } ?>
                        <img width="80" src="assets/imagens/logo2.png" alt="Logo">
                    </div>
                    
                    <form action="<?php echo base_url('login/logar') ?>" method="post">
                        <!-- input login -->
                        <div class="input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" id="login" name="login" placeholder="Informe o seu login" class="validate">
                            <label for="login">Email</label>
                        </div>

                        <!-- input senha -->
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" id="senha" name="senha" placeholder="Informe a senha" class="validate">
                            <label for="senha">Senha</label>
                        </div>

                        <!-- input check -->
                        <p>
                            <label>
                                <input type="checkbox" id="checkme" />
                                <span>Manter-me conectado</span>
                            </label>
                        </p>

                        <!-- botão Logar -->
                        <br>
                        <div class="center-align">
                            <button type="submit" class="btn-large waves-effect  red darken-4">
                                Acessar
                                <i class="material-icons right">login</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
