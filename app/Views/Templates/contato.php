<!-- Abre Contato -->
<div id="contato" class="container ">
                <h1> Contato</h1>

                <form action method="post">
                    <!-- input nome -->
                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome </label>
                        <input type="text" class="form-control" name="nome"
                            id="nome">
                    </div>

                    <!-- input email -->
                    <div class="mb-3">
                        <label for="email" class="form-label"> E-mail </label>
                        <input type="text" class="form-control" name="email"
                            id="email">
                    </div>

                    <!-- input email -->
                    <div class="mb-3">
                        <label for="descricao" class="form-label"> Assunto</label>
                        <textarea cols="30" rows="10" type="text"
                            class="form-control"
                            name="descricao" id="descricao"></textarea>
                    </div>

                    <button type="submit" class="btn mb-5 btn-primary float-end">
                        Enviar
                        <i class="bi bi-send"></i>
                    </button>
                </form>

            </div>
            <!-- Fecha Contato -->