<?php

namespace App\Controllers;
use App\Models\Produtos as Produtos_model;
use App\Models\Categorias as Categorias_model;
use CodeIgniter\Model;

class Produtos extends BaseController
{
    private $produtos;
    private $categorias;
    public function __construct(){
        $this->produtos = new Produtos_model();
        $this->categorias = new Categorias_model();
        $data['title'] = 'Produtos';
        helper('functions');
    }

    public function index()
    {
        $data['title'] = 'Produtos';
        $data['produtos'] = $this->produtos->findAll();
        return view('Templates/produtos', $data);
    } 

    public function new(): string
    {
        $data['title'] = 'Produtos';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['categorias'] = $this->categorias->findAll();
        $data['produtos'] = (object) [
            'nome'=> '',
            'descricao'=> '',
            'preco_custo'=> '0.00',
            'preco_venda'=> '0.00',
            'categorias_id'=> '',
            'produtos_id'=> ''
        ];
        return view('Produtos/form',$data);
    }
    public function create()
    {

        // Checks whether the submitted data passed the validation rules.
        if(!$this->validate([
            'nome' => 'required|max_length[255]|min_length[3]',
            'preco_custo' => 'required',
            'preco_venda' => 'required'
        ])) {
            
            // The validation fails, so returns the form.
            $data['produtos'] = (object) [
                //'produtos_id' => $_REQUEST['produtos_id'],
                'nome' => $_REQUEST['nome'],
                'descricao' => $_REQUEST['descricao'],
                'preco_custo' => moedaDolar($_REQUEST['preco_custo']),
                'preco_venda' => moedaDolar($_REQUEST['preco_venda']),
                'categorias_id' => $_REQUEST['categorias_id']
            ];
            
            $data['title'] = 'Produtos';
            $data['form'] = 'Cadastrar';
            $data['op'] = 'create';
            return view('Produtos/form',$data);
        }


        $this->produtos->save([
            'nome' => $_REQUEST['nome'],
            'descricao' => $_REQUEST['descricao'],
            'preco_custo' => moedaDolar($_REQUEST['preco_custo']),
            'preco_venda' => moedaDolar($_REQUEST['preco_venda']),
            'categorias_id' => $_REQUEST['categorias_id']
        ]);
        
        $data['msg'] = msg('Cadastrado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'categorias_id = categorias_id')->find();
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);

    }

    public function delete($id)
    {
        $this->produtos->where('produtos_id', (int) $id)->delete();
        $data['msg'] = msg('Deletado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'categorias_id = categorias_id')->find();
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);
    }

    public function edit($id)
    {
        $data['categorias'] = $this->categorias->findAll();
        $data['produtos'] = $this->produtos->find(['produtos_id' => (int) $id])[0];
        $data['title'] = 'Produtos';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('Produtos/form',$data);
    }

    public function update()
    {
        $dataForm = [
            'produtos_id' => $_REQUEST['produtos_id'],
            'nome' => $_REQUEST['nome'],
            'descricao' => $_REQUEST['descricao'],
            'preco_custo' => moedaDolar($_REQUEST['preco_custo']),
            'preco_venda' => moedaDolar($_REQUEST['preco_venda']),
            'categorias_id' => $_REQUEST['categorias_id']
        ];

        $this->produtos->update($_REQUEST['produtos_id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'categorias_id = categorias_id')->find();
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);
    }

    public function search()
    {
        //$data['produtos'] = $this->produtos->like('nome', $_REQUEST['pesquisar'])->find();
        $data['produtos'] = $this->produtos->join('categorias', 'categorias_id = categorias_id')->like('nome', $_REQUEST['pesquisar'])->orlike('nome', $_REQUEST['pesquisar'])->find();
        $total = count($data['produtos']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);

    }
    public function pesquisar(){
        $produto = new Produtos_model();
        $produtos = $produto->findAll();  
        return $produtos;
        
        
}
}
