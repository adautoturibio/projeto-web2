<?php

namespace App\Controllers;
use App\Models\Usuarios as Usuarios_model;

class Usuarios extends BaseController
{
    private $usuarios;
    public function __construct(){
        $this->usuarios = new Usuarios_model();
        $data['title'] = 'Usuarios';
        helper('functions');
    }
    public function index(): string
    {
        $data['title'] = 'Usuarios';
        $data['usuarios'] = $this->usuarios->findAll();
        return view('Usuarios/index',$data);
    }

    public function new(): string
    {
        $data['title'] = 'Usuarios';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['usuarios'] = (object) [
            'nome'=> '',
            'sobrenome'=> '',
            'telefone'=> '',
            'data_nasc'=> '',
            'email'=> '',
            'senha'=> '',            
            'id'=> ''
        ];
        return view('Usuarios/form',$data);
    }
    public function create()
    {

        // Checks whether the submitted data passed the validation rules.
        if(!$this->validate([
            'nome' => 'required|max_length[255]|min_length[3]',
            'sobrenome' => 'required',
            'telefone' => 'required',
            'data_nasc' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'nivel' => 'required',
        ])) {
            
            // The validation fails, so returns the form.
            $data['usuarios'] = (object) [
                'usuarios_id' => '',
                'nome' => $_REQUEST['nome'],
                'sobrenome' => $_REQUEST['sobrenome'],
                'telefone' => $_REQUEST['telefone'],
                'data_nasc' => moedaDolar($_REQUEST['data_nasc']),
                'email' => $_REQUEST['email'],
                'senha' => $_REQUEST['senha'],
                'nivel' => $_REQUEST['nivel']
            ];
            
            $data['title'] = 'Usuarios';
            $data['form'] = 'Cadastrar';
            $data['op'] = 'create';
            return view('Usuarios/form',$data); //corrigir form
        }


        $this->usuarios->save([
            'nome' => $_REQUEST['nome'],
            'sobrenome' => $_REQUEST['sobrenome'],
            'telefone' => $_REQUEST['telefone'],
            'data_nasc' => moedaDolar($_REQUEST['data_nasc']),
            'email' => $_REQUEST['email'],
            'senha' => $_REQUEST['senha'],
            'nivel' => $_REQUEST['nivel']
        ]);
        
        $data['msg'] = msg('Cadastrado com Sucesso!','success');
        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';
        return view('Usuarios/index',$data); // verificar index de usuarios

    }

    public function delete($id)
    {
        $this->usuarios->where('usuarios_id', (int) $id)->delete();
        $data['msg'] = msg('Deletado com Sucesso!','success');
        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';
        return view('Usuarios/index',$data);
    }

    public function edit($id)
    {
        $data['usuarios'] = $this->usuarios->find(['usuarios_id' => (int) $id])[0];
        $data['title'] = 'Usuarios';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('Usuarios/form',$data);
    }

    public function update()
    {
        $dataForm = [
            'usuarios_id' => '',
            'nome' => $_REQUEST['nome'],
            'sobrenome' => $_REQUEST['sobrenome'],
            'telefone' => $_REQUEST['telefone'],
            'data_nasc' => moedaDolar($_REQUEST['data_nasc']),
            'email' => $_REQUEST['email'],
            'senha' => $_REQUEST['senha'],
            'nivel' => $_REQUEST['nivel']
        ];

        $this->usuarios->update($_REQUEST['usuarios_id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';
        return view('Usuarios/index',$data);
    }

    public function search()
    {
        //$data['usuarios'] = $this->usuarios->like('usuarios_nome', $_REQUEST['pesquisar'])->find();
        $data['usuarios'] = $this->usuarios->like('nome', $_REQUEST['pesquisar'])->find();
        $total = count($data['usuarios']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'Usuarios';
        return view('Usuarios/index',$data);

    }

            // Funções destinadas ao outro formato de usuário.

    public function edit_senha(): string
    {
        $data['usuarios'] = (object) [
            'nova_senha'=> '',
            'confirmar_senha'=> ''
        ];

        $data['title'] = 'Usuarios';
        return view('Usuarios/edit_senha',$data);
    }

    public function salvar_senha():string {

        // Checks whether the submitted data passed the validation rules.
        if(!$this->validate([
            'senha_atual' => 'required',
            'nova_senha' => 'required|max_length[14]|min_length[6]',
            'confirmar_senha' => 'required|max_length[14]|min_length[6]'
        ])) {
            
            // The validation fails, so returns the form.
            $data['usuarios'] = (object) [
                'senha_atual' => $_REQUEST['senha_atual'],
                'nova_senha' => $_REQUEST['nova_senha'],
                'confirmar_senha' => $_REQUEST['confirmar_senha']
            ];
            $data['title'] = 'Usuarios';
            $data['msg'] = msg("Divergência de dados","danger");
            return view('Usuarios/edit_senha',$data);
        }

        $data['usuarios'] = (object) [
            'senha_atual' => $_REQUEST['senha_atual'],
            'nova_senha' => $_REQUEST['nova_senha'],
            'confirmar_senha' => $_REQUEST['confirmar_senha']
        ];

        $data['check_senha'] = $this->usuarios->find(['usuarios_id' => (int) $_REQUEST['usuarios_id']])[0];

        if($data['check_senha']->senha == md5($_REQUEST['senha_atual'])){
            if($_REQUEST['nova_senha'] == $_REQUEST['confirmar_senha']){

                $dataForm = [
                    'usuarios_id' => $_REQUEST['usuarios_id'],
                    'senha' => md5($_REQUEST['nova_senha'])
                ];
        
                $this->usuarios->update($_REQUEST['usuarios_id'], $dataForm);
                $data['msg'] = msg('Senha alterada!','success');
                $data['usuarios'] = $this->usuarios->findAll();
                $data['title'] = 'Usuarios';
                return view('Usuarios/index',$data);


            }else{
                $data['title'] = 'Usuarios';
                $data['msg'] = msg("As senhas não são iguais!","danger");
                return view('Usuarios/edit_senha',$data);
            }

        }else{
            $data['title'] = 'Usuarios';
            $data['msg'] = msg("A senha atual é invalida","danger");
            return view('Usuarios/edit_senha',$data);
        }
    }
    
    public function edit_nivel(): string
    {
        $data['nivel'] = [
            ['id' => 0, 'nivel' => "Usuário"],
            ['id' => 1, 'nivel' => "Administrador"]
        ];

        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';


        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';
        return view('Usuarios/edit_nivel',$data);
    }

    public function salvar_nivel(): string
    {

        $dataForm = [
            'usuarios_id' => $_REQUEST['usuarios_id'],
            'nivel' => $_REQUEST['nivel']
        ];

        $this->usuarios->update($_REQUEST['usuarios_id'], $dataForm);
        $data['msg'] = msg('Nivel alterada!','success');
        $data['usuarios'] = $this->usuarios->findAll();
        $data['title'] = 'Usuarios';
        return view('Usuarios/index',$data);
    }



}
