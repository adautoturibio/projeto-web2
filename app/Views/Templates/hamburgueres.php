<div class="container">

<h2 class="cor-1t"><b>Hamburgueres</b></h2>
<hr class="linha">

</div>

<?php foreach($produto as $produtos):?>
  <div class="row">
    <div class="col s12 m3 ">
      <div class="card">
        <div class="card-image">
        <img src="https://www.google.com/url?sa=i&url=http%3A%2F%2Ft2.gstatic.com%2Flicensed-image%3Fq%3Dtbn%3AANd9GcRRto3IlY56MlAIOAvXHvPEVxBDVzG1uz1zULEBYdJ-I4Aa-xOyPEVvv7fmIjLnxaOz&psig=AOvVaw0-RVzzvu6BLMttqQHNNbGs&ust=1722703881183000&source=images&cd=vfe&opi=89978449&ved=0CAkQjRxqFwoTCMDh05ji1ocDFQAAAAAdAAAAABAE">
          <!-- <?//php echo $produtos['fotos'] ?> -->
          <span style="color: darkred" class="card-title"><?php echo $produtos['nome'] ?></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <span class="card-title"><?php echo $produtos['preco'] ?></span>
          <p><?php echo $produtos['descricao']?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>