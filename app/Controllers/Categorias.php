<?php

namespace App\Controllers;
use App\Models\Categorias as Categorias_model;

class Categorias extends BaseController
{
    private $categorias;
    public function __construct(){
        $this->categorias = new Categorias_model();
        $data['title'] = 'Categorias';
        helper('functions');
    }
    public function index(): string
    {
        $data['title'] = 'Categorias';
        $data['categorias'] = $this->categorias->findAll();
        return view('Categorias/index',$data);
    }

    public function new(): string
    {
        $data['title'] = 'Categorias';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['categorias'] = (object) [
            'categorias_nome'=> '',
            'categorias_id'=> ''
        ];
        return view('Categorias/form',$data);
    }
    public function create()
    {

        // Checks whether the submitted data passed the validation rules.
        if(!$this->validate([
            'categorias_nome' => 'required|max_length[255]|min_length[3]',
        ])) {
            
            // The validation fails, so returns the form.
            $data['categorias'] = (object) [
                //'categorias_id' => $_REQUEST['categorias_id'],
                'categorias_nome' => $_REQUEST['categorias_nome'],
            ];
            
            $data['title'] = 'Categorias';
            $data['form'] = 'Cadastrar';
            $data['op'] = 'create';
            return view('Categorias/form',$data);
        }


        $this->categorias->save([
            'categorias_nome' => $_REQUEST['categorias_nome']

        ]);
        
        $data['msg'] = msg('Cadastrado com Sucesso!','success');
        $data['categorias'] = $this->categorias->findAll();
        $data['title'] = 'Categorias';
        return view('Categorias/index',$data);

    }

    public function delete($id)
    {

        $this->categorias->where('categorias_id', (int) $id)->delete();
        $data['msg'] = msg('Deletado com Sucesso!','success');
        $data['categorias'] = $this->categorias->findAll();
        $data['title'] = 'Categorias';
        return view('Categorias/index',$data);
    }

    public function edit($id)
    {
        $data['categorias'] = $this->categorias->find(['categorias_id' => (int) $id])[0];
        $data['title'] = 'Categorias';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('Categorias/form',$data);
    }

    public function update()
    {
        $dataForm = [
            'categorias_id' => $_REQUEST['categorias_id'],
            'categorias_nome' => $_REQUEST['categorias_nome']
        ];

        $this->categorias->update($_REQUEST['categorias_id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['categorias'] = $this->categorias->findAll();
        $data['title'] = 'Categorias';
        return view('Categorias/index',$data);
    }

    public function search()
    {

        $data['categorias'] = $this->categorias->like('categorias_nome', $_REQUEST['pesquisar'])->find();
        $total = count($data['categorias']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'Categorias';
        return view('Categorias/index',$data);

    }

}
