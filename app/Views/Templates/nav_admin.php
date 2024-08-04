<!-- Abre o menu de navegação -->
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <!--Logo do Projeto-->
            <img src="<?php echo base_url('assets/images/bootstrap-logo.svg') ?>" alt="Bootstrap" width="30"
                height="24">
            Bootstrap
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Link Home-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin') ?>">
                        <i class="bi bi-house-fill"></i>
                        Home
                    </a>
                </li>

                <!-- Link usuários-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('usuarios') ?>">
                        <i class="bi bi-person"></i>
                        Usuários
                    </a>
                </li>

                <!-- Link Categorias-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('categorias') ?>">
                        <i class="bi bi-file-earmark-text"></i>
                        Categorias
                    </a>
                </li>

                <!-- Link Produtos-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('produtos') ?>">
                        <i class="bi bi-basket"></i>
                        Produtos
                    </a>
                </li>

                <!-- Link IMG Produtos-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('imgprodutos') ?>">
                        <i class="bi bi-images"></i>
                        IMG Produtos
                    </a>
                </li>

                <!-- Link Alterar Senha-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('usuarios/edit_senha') ?>">
                        <i class="bi bi-key"></i>
                        Alterar Senha
                    </a>
                </li>

                <!-- Link Alterar Nível-->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('usuarios/edit_nivel') ?>">
                        <i class="bi bi-bar-chart-steps"></i>
                        Alterar Nível
                    </a>
                </li>

            </ul>

            <div class="d-flex">
                <a class="btn btn-outline-primary me-2" href="<?php echo base_url('login/logout') ?>">
                    <i class="bi bi-unlock"></i>
                    sair
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Fecha o menu de navegação -->