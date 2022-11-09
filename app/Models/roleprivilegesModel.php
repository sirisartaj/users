<?php

namespace App\Models;

use CodeIgniter\Model;

class roleprivilegesModel extends Model
{
    protected $table      = 'roleprivileges';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['iduserrole','idaccessright','created_at'];

    //protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    //protected $skipValidation     = false;
    

    
    public function getroleprivileges($roleid='')
    {
        if($roleid){
            return $this->where('iduserrole',$roleid)->findAll();
        }
        return $this->findAll();
        
    }


    public function maproleprivileges()
    {
        return $this->findAll();
        
    }
    
}