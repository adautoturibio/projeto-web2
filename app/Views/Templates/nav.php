<!-- Abre o menu de navegação -->
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary"
            data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!--Logo do Projeto-->
                    <img src="assets/images/bootstrap-logo.svg" alt="Bootstrap"
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
                                href="#">
                                <i class="bi bi-house-fill"></i>
                                Home
                            </a>
                        </li>


                        <!-- Link Produtos-->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="#contato">
                                <i class="bi bi-telephone"></i>
                                Contato
                            </a>
                        </li>

                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search"
                            placeholder="Pesquisar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>

                    <div class="d-flex">
                        <a class="btn btn-outline-primary me-2" href="<?php echo base_url('login') ?>">
                            <i class="bi bi-lock"></i>
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fecha o menu de navegação -->