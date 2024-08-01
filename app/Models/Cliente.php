<?php

namespace App\Models;

use CodeIgniter\Model;

class Cliente extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFiels = ['atributos da classe '];
}