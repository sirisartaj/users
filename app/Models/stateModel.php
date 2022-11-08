<?php
namespace App\Models;

use CodeIgniter\Model;

class stateModel extends Model
{
    protected $table      = 'states';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['country_id','status','name'];

    //protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    //protected $skipValidation     = false;
    

    function findstate(){
        
       return $this->findAll();
    }

    
    
}