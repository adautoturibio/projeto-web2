<!-- Abre o menu de navegação -->
<nav class="z"
            data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!--Logo do Projeto-->
                    <img src=<?= base_url("assets/images/bootstrap-logo.svg") ?> alt="Bootstrap"
                        width="30" height="24">
                    Bootstrap
                </a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Link Home-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo base_url('user') ?>">
                                <i class="bi bi-house-fill"></i>
                                Home
                            </a>
                        </li>

                          

                    </ul>


                    <div class="d-flex">
                        <a class="btn btn-outline-primary me-2" 
                        href="<?php echo base_url('login/logout') ?>">
                            <i class="bi bi-unlock"></i>
                            sair
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fecha o menu de navegação -->