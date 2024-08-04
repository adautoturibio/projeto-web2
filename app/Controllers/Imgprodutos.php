<?php

namespace App\Controllers;
use App\Models\Imgprodutos as Imgprodutos_model;
use App\Models\Produtos as Produtos_model;

use CodeIgniter\Files\File;

class Imgprodutos extends BaseController
{
    protected $helpers = ['form'];
    private $imgprodutos;
    private $produtos;
    public function __construct(){
        $this->imgprodutos = new Imgprodutos_model();
        $this->produtos = new Produtos_model();
        $data['title'] = 'Imgprodutos';
        helper('functions');
    }
    public function index(): string
    {
        $data['title'] = 'Imgprodutos';
        $data['imgprodutos'] = $this->imgprodutos->findAll();
        return view('Imgprodutos/index',$data);
    }

    public function new(): string
    {
        $data['title'] = 'Imgprodutos';
        $data['produtos'] = $this->produtos->findAll();
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['imgprodutos'] = (object) [
            'imgprodutos_link'=> '',
            'imgprodutos_descricao'=> '',
            'imgprodutos_produtos_id'=> '',
            'imgprodutos_id'=> ''
        ];
        return view('Imgprodutos/form',$data);
    }
    public function create()
    {
        $validationRule = [
            'imgprodutos_link' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[imgprodutos_link]',
                    'is_image[imgprodutos_link]',
                    'mime_in[imgprodutos_link,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[imgprodutos_link,10000]',
                    'max_dims[imgprodutos_link,4024,4024]',
                ],
            ],
        ];

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            $data['imgprodutos'] = (object) [
                'imgprodutos_id' => '',
                'imgprodutos_link' => $_FILES['imgprodutos_link']['name'],
                'imgprodutos_descricao' => $_REQUEST['imgprodutos_descricao'],
                'imgprodutos_produtos_id' => $_REQUEST['imgprodutos_produtos_id']
            ];
            $data['produtos'] = $this->produtos->findAll();
            $data['title'] = 'Imgprodutos';
            $data['form'] = 'Cadastrar';
            $data['op'] = 'create';
            return view('Imgprodutos/form',$data);
        }

        $img = $this->request->getFile('imgprodutos_link');

        if (!$img->hasMoved()) {
            $imgpath = $img->store();
            $filepath = WRITEPATH . 'uploads/'.$imgpath;
            $data = ['uploaded_fileinfo' => new File($filepath)];
            
            $subPasta = explode("/", $imgpath);

            $pastaO = WRITEPATH.'/uploads/'.$subPasta[0].'/';
            $pastaD = 'assets/uploads/'.$subPasta[0].'/';

            if (file_exists($pastaD)) {
                if(copy($pastaO.$subPasta[1], $pastaD.$subPasta[1])){
                    $data['msg'] = msg("Sucesso no Upload","success");
                }else{
                    $data['msg'] = msg("Falha no Upload","danger");
                }

            }else {
                mkdir($pastaD, 0777, TRUE);
                if(copy($pastaO.$subPasta[1], $pastaD.$subPasta[1])){
                    $data['msg'] = msg("Sucesso no Upload","success");
                }else{
                    $data['msg'] = msg("Falha no Upload","danger");
                }
            }

            unlink($pastaO.$subPasta[1]);

            $form = [
                'imgprodutos_link' => 'uploads/'.$imgpath,
                'imgprodutos_descricao' => $_REQUEST['imgprodutos_descricao'],
                'imgprodutos_produtos_id' => $_REQUEST['imgprodutos_produtos_id']
            ];
            $this->imgprodutos->save($form);
            
            $data['imgprodutos'] = $this->imgprodutos->findAll();
            $data['title'] = 'Imgprodutos';
            return view('Imgprodutos/index',$data);
        }
    }

    public function delete($id)
    {
        // carrega o link da imagem a ser deletada
        $data['clear_img'] = $this->imgprodutos->find(['imgprodutos_id' => (int) $id])[0];
        $this->imgprodutos->where('imgprodutos_id', (int) $id)->delete();
        
        // deletar a imagem da pasta upload
        unlink('assets/'.$data['clear_img']->imgprodutos->produtos_link);
        
        $data['msg'] = msg('Deletado com Sucesso!','success');
        $data['imgprodutos'] = $this->imgprodutos->findAll();
        $data['title'] = 'Imgprodutos';
        return view('Imgprodutos/index',$data);
    }

    public function edit($id)
    {
        $data['imgprodutos'] = $this->imgprodutos->find(['imgprodutos_id' => (int) $id])[0];
        $data['produtos'] = $this->produtos->findAll();
        $data['title'] = 'Imgprodutos';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('Imgprodutos/form',$data);
    }

    public function update()
    {
        $dataForm = [
            'imgprodutos_id' => $_REQUEST['imgprodutos_id'],
            'imgprodutos_link' => $_REQUEST['imgprodutos_link'],
            'imgprodutos_descricao' => $_REQUEST['imgprodutos_descricao'],
            'imgprodutos_produtos_id' => $_REQUEST['imgprodutos_produtos_id']
        ];

        $this->imgprodutos->update($_REQUEST['imgprodutos_id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['imgprodutos'] = $this->imgprodutos->findAll();
        $data['title'] = 'Imgprodutos';
        return view('Imgprodutos/index',$data);
    }

    public function search()
    {

        $data['imgprodutos'] = $this->imgprodutos->like('imgprodutos_id', $_REQUEST['pesquisar'])->find();
        $total = count($data['imgprodutos']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'Imgprodutos';
        return view('Imgprodutos/index',$data);

    }

}
