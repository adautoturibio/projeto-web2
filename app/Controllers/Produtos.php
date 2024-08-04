<?php

namespace App\Controllers;
use App\Models\Produtos as Produtos_model;
use App\Models\Categorias as Categorias_model;

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
    public function index(): string
    {
        $data['title'] = 'Produtos';
        $data['produtos'] = $this->produtos->join('categorias', 'produtos_categorias_id = categorias_id')->find();
        //$data['produtos'] = $this->produtos->findAll();
        return view('Produtos/index',$data);
    }

    public function new(): string
    {
        $data['title'] = 'Produtos';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['categorias'] = $this->categorias->findAll();
        $data['produtos'] = (object) [
            'produtos_nome'=> '',
            'produtos_descricao'=> '',
            'produtos_preco_custo'=> '0.00',
            'produtos_preco_venda'=> '0.00',
            'produtos_categorias_id'=> '',
            'produtos_id'=> ''
        ];
        return view('Produtos/form',$data);
    }
    public function create()
    {

        // Checks whether the submitted data passed the validation rules.
        if(!$this->validate([
            'produtos_nome' => 'required|max_length[255]|min_length[3]',
            'produtos_preco_custo' => 'required',
            'produtos_preco_venda' => 'required'
        ])) {
            
            // The validation fails, so returns the form.
            $data['produtos'] = (object) [
                //'produtos_id' => $_REQUEST['produtos_id'],
                'produtos_nome' => $_REQUEST['produtos_nome'],
                'produtos_descricao' => $_REQUEST['produtos_descricao'],
                'produtos_preco_custo' => moedaDolar($_REQUEST['produtos_preco_custo']),
                'produtos_preco_venda' => moedaDolar($_REQUEST['produtos_preco_venda']),
                'produtos_categorias_id' => $_REQUEST['produtos_categorias_id']
            ];
            
            $data['title'] = 'Produtos';
            $data['form'] = 'Cadastrar';
            $data['op'] = 'create';
            return view('Produtos/form',$data);
        }


        $this->produtos->save([
            'produtos_nome' => $_REQUEST['produtos_nome'],
            'produtos_descricao' => $_REQUEST['produtos_descricao'],
            'produtos_preco_custo' => moedaDolar($_REQUEST['produtos_preco_custo']),
            'produtos_preco_venda' => moedaDolar($_REQUEST['produtos_preco_venda']),
            'produtos_categorias_id' => $_REQUEST['produtos_categorias_id']
        ]);
        
        $data['msg'] = msg('Cadastrado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'produtos_categorias_id = categorias_id')->find();
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);

    }

    public function delete($id)
    {
        $this->produtos->where('produtos_id', (int) $id)->delete();
        $data['msg'] = msg('Deletado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'produtos_categorias_id = categorias_id')->find();
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
            'produtos_nome' => $_REQUEST['produtos_nome'],
            'produtos_descricao' => $_REQUEST['produtos_descricao'],
            'produtos_preco_custo' => moedaDolar($_REQUEST['produtos_preco_custo']),
            'produtos_preco_venda' => moedaDolar($_REQUEST['produtos_preco_venda']),
            'produtos_categorias_id' => $_REQUEST['produtos_categorias_id']
        ];

        $this->produtos->update($_REQUEST['produtos_id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['produtos'] = $this->produtos->join('categorias', 'produtos_categorias_id = categorias_id')->find();
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);
    }

    public function search()
    {
        //$data['produtos'] = $this->produtos->like('produtos_nome', $_REQUEST['pesquisar'])->find();
        $data['produtos'] = $this->produtos->join('categorias', 'produtos_categorias_id = categorias_id')->like('produtos_nome', $_REQUEST['pesquisar'])->orlike('categorias_nome', $_REQUEST['pesquisar'])->find();
        $total = count($data['produtos']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'Produtos';
        return view('Produtos/index',$data);

    }

}
