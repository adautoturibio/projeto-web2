<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Home extends BaseController
{
    public function index(): string
    {
        $produto = new ProdutoModel();
        $produtos = $produto->findAll();
        
        $variavel = [
              'titulo' => "Pedidos",
              'produto' => $produtos  
        ];
        return view('index', $variavel);
    }
}
