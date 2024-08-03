<?php 
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller{
   
    public function index(){

        $user = new UsuarioModel();
        $usuarios = $user->findAll();
        $variaveis = [
            'titulo' =>'Tela de usuario',
            'body'=> 'Está e a pagina de usuario',
            'usuarios' => $usuarios
        ];
        return view('usuarios/home',$variaveis);
    }
    public function sobre(){
        return view('usuarios/sobre');
    }
}
?>