<?php 
namespace App\Controllers;

use App\Models\ProdutoModel;
use CodeIgniter\Controller;

class ProdutoController extends Controller{
    public function index(){
        $produto = new ProdutoModel();
        $produtos = $produto->findAll();
        
        $variavel = [
              'titulo' => "Pedidos",
              'produto' => $produtos  
        ];
        //echo("Views/Templates/hamburgueres");
        return view('Views/Templates/hamburgueres',$variavel);
    }
}
/*$user = new UsuarioModel();
$usuarios = $user->findAll();
$variaveis = [
    'titulo' =>'Tela de usuario',
    'body'=> 'Está e a pagina de usuario',
    'usuarios' => $usuarios
];*/
?>