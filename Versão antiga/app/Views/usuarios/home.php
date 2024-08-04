<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo?></title>
</head>
<body>
    <h1>Bem vindo a tela de PHP</h1>
    <h3>Usuario cadastrados</h3>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Senha</th>
        </tr>
        <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']?></td>
                <td><?php echo $usuario['nome']?></td>
                <td><?php echo $usuario['senha']?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>