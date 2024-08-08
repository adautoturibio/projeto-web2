<?php 
include('header.php');
include('nav.php');
?>

<div class="container">
    <h2 class="cor-1t" id="hamburger"><b>Sacola</b></h2>
    <hr class="linha">


    <table>
        <thead>
          <tr>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Preço</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Burguer Especial  </td>
            <td><input id="quantity" type="number" class="validate" min="0" max="10" step="1" value="1">></td>
            <td>$28,00</td>
          </tr>
          <tr>
            <td>Cheese Burguer</td>
            <td><input id="quantity" type="number" class="validate" min="0" max="10" step="1" value="1">></td>
            <td>$22,00</td>
          </tr>
        </tbody>
    </table>

    <br><br>

        
    <table>
        <thead>
          <tr>
              <th>Modo de Retirada:</th>
              <th></th>
              <th>Preço:</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
                <p>
                    <label>
                        <input class="with-gap" name="group1" type="radio" checked />
                        <span>Delivery</span>
                     </label>
                </p>
                <p>
                    <label>
                        <input class="with-gap" name="group1" type="radio" />
                        <span>Retirada no balcão</span>
                    </label>
                </p>
            </td>
            <td></td>
            <td>$5,00</td>
          </tr>
        </tbody>
    </table>

<br><br>

<a href="https://api.whatsapp.com/send?phone=+5562984093303&text=Ol%C3%A1+queria+fazer+um+pedido%21" class="waves-effect waves-light btn-large green right"><i class="material-icons left">shopping_basket</i><b>Finalizar pedido</b></a>

<br><br><br><br><br>


</div>

<?php 
include('footer.php');
include('end.php');
?>