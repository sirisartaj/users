<?php

namespace App\Models;

use CodeIgniter\Model;

class accessrightsModel extends Model
{
    protected $table      = 'accessrights';
    protected $primaryKey = 'idAccessRights';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['Name','parentname','created_at'];

    //protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    //protected $skipValidation     = false;
    

    
    public function getaccessrights()
    {
        return $this->findAll();
        
    }


    public function maproleprivileges()
    {
        return $this->findAll();
        
    }
    
}