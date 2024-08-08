<!-- Abre o menu de navegação -->
<nav class="nav-wrapper cor-1b">
    <div class="">
        
        <a class="brand-logo" href="/home"><img src="/assets/imagens/logo.png" alt="Logo" class="navbar-logo"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
            <!-- Link Home-->
            <li>
                <a href="<?php echo base_url('admin') ?>">
                    <i class="material-icons">home</i>
                    Home
                </a>
            </li>

            <!-- Link Usuários -->
            <li>
                <a href="<?php echo base_url('usuarios') ?>">
                    <i class="material-icons">person</i>
                    Usuários
                </a>
            </li>

            <!-- Link Categorias -->
            <li>
                <a href="<?php echo base_url('categorias') ?>">
                    <i class="material-icons">description</i>
                    Categorias
                </a>
            </li>

            <!-- Link Produtos -->
            <li>
                <a href="<?php echo base_url('produtos') ?>">
                    <i class="material-icons">shopping_basket</i>
                    Produtos
                </a>
            </li>

            <!-- Link IMG Produtos -->
            <li>
                <a href="<?php echo base_url('imgprodutos') ?>">
                    <i class="material-icons">image</i>
                    IMG Produtos
                </a>
            </li>

            <!-- Link Alterar Senha -->
            <li>
                <a href="<?php echo base_url('usuarios/edit_senha') ?>">
                    <i class="material-icons">vpn_key</i>
                    Alterar Senha
                </a>
            </li>

            <!-- Link Alterar Nível -->
            <li>
                <a href="<?php echo base_url('usuarios/edit_nivel') ?>">
                    <i class="material-icons">bar_chart</i>
                    Alterar Nível
                </a>
            </li>

            <!-- Botão Sair -->
            <li>
                <a class="btn white blue-text" href="<?php echo base_url('login/logout') ?>">
                    <i class="material-icons">exit_to_app</i>
                    Sair
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Menu de navegação móvel -->
<ul class="sidenav" id="mobile-demo">
    <!-- Link Home-->
    <li>
        <a href="<?php echo base_url('admin') ?>">
            <i class="material-icons">home</i>
            Home
        </a>
    </li>

    <!-- Link Usuários -->
    <li>
        <a href="<?php echo base_url('usuarios') ?>">
            <i class="material-icons">person</i>
            Usuários
        </a>
    </li>

    <!-- Link Categorias -->
    <li>
        <a href="<?php echo base_url('categorias') ?>">
            <i class="material-icons">description</i>
            Categorias
        </a>
    </li>

    <!-- Link Produtos -->
    <li>
        <a href="<?php echo base_url('produtos') ?>">
            <i class="material-icons">shopping_basket</i>
            Produtos
        </a>
    </li>

    <!-- Link IMG Produtos -->
    <li>
        <a href="<?php echo base_url('imgprodutos') ?>">
            <i class="material-icons">image</i>
            IMG Produtos
        </a>
    </li>

    <!-- Link Alterar Senha -->
    <li>
        <a href="<?php echo base_url('usuarios/edit_senha') ?>">
            <i class="material-icons">vpn_key</i>
            Alterar Senha
        </a>
    </li>

    <!-- Link Alterar Nível -->
    <li>
        <a href="<?php echo base_url('usuarios/edit_nivel') ?>">
            <i class="material-icons">bar_chart</i>
            Alterar Nível
        </a>
    </li>

    <!-- Botão Sair -->
    <li>
        <a class="btn white blue-text" href="<?php echo base_url('login/logout') ?>">
            <i class="material-icons">exit_to_app</i>
            Sair
        </a>
    </li>
</ul>
