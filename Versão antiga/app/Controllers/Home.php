<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Home extends BaseController
{
    public function index(): string
    {
        // $produto = new Produtos();
        // $produto = $produto->findAll();
        
        // $variavel = [
        //       'titulo' => "Pedidos",
        //       'produto' => $produto  
        // ];
        // return view('index', $variavel);
        return view('index');
    }
}
