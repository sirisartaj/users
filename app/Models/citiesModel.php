<?php
namespace App\Models;

use CodeIgniter\Model;

class citiesModel extends Model
{
    protected $table      = 'cities';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['state_id','status','name'];

    //protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    //protected $skipValidation     = false;
    

    function findcitiesbystateid($id){
        
       return $this->where(['state_id' => $id])->findAll();
    }

    function findcities(){
        
       return $this->findAll();
    }
    
    
}