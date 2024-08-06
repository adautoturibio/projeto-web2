<nav>
    <div class="nav-wrapper cor-1b">
        <!-- LOGO -->
        <a class="brand-logo" href="#"><img src="/assets/imagens/logo.png" alt="Logo" class="navbar-logo"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down"> 
            <li><a href="#" class="hover-yellow"><i class="tiny material-icons left">restaurant_menu</i>Cardápio</a></li>
            <li><a href="#" class="hover-yellow"><i class="tiny material-icons left">local_mall</i>Sacola</a></li>
        </ul>
    </div>
</nav>



<ul class="sidenav" id="mobile-demo">
    <li><a href="#"><i class="tiny material-icons left">restaurant_menu</i>Cardápio</a></li>
    <li><a href="#"><i class="tiny material-icons left">local_mall</i>Sacola</a></li>
</ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
</script>
