<!--Abre Carousel-->
<div class="carousel carousel-slider">
    <!-- Indicators/dots -->
    <ul class="indicators">
        <li class="indicator-item active" data-target="#demo" data-slide-to="0"></li>
        <li class="indicator-item" data-target="#demo" data-slide-to="1"></li>
        <li class="indicator-item" data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!--Abre Carousel-->
    <div class="carousel-item active">
        <img src="assets/imagens/carousel1.png" alt="Carousel1" style="width:100%">
        <div class="carousel-caption center-align">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="assets/imagens/carousel2.png" alt="Carousel2" style="width:100%">
        <div class="carousel-caption center-align">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <a href="#demo" class="carousel-prev" data-slide="prev">
        <i class="material-icons">chevron_left</i>
    </a>
    <a href="#demo" class="carousel-next" data-slide="next">
        <i class="material-icons">chevron_right</i>
    </a>
</div>
<!--Fecha Carousel-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems, {
            fullWidth: true,
            indicators: true,
            duration: 500 // Tempo da transição entre os slides em milissegundos (0,5 segundos)
        });

        // Avança para o próximo slide a cada 4 segundos
        setInterval(function() {
            var activeCarousel = M.Carousel.getInstance(elems[0]);
            activeCarousel.next();
        }, 5000); // 4 segundos
    });
</script>
