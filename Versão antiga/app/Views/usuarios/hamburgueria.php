<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo?></title>
</head>
<body>
    <?php foreach($produtos as $produto):?>
  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="images/sample-1.jpg">
          <span class="card-title"><?php echo $produto['nome'] . $produto['preco']?></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p><?php $produto['descricao']?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</body>
</html>