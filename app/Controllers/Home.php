<?php

namespace App\Controllers;
use App\Models\Produtos;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('index');
    // }
    public function index()
    {
        $produto = new Produtos();
        $data = $produto->findAll();
        $variavel = [
            'titulo' => "Produtos",
            'produtos' => $data
        ];
        return view('Templates/produtos', $variavel);
    } 
}

