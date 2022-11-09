<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table      = 'userrole';
    protected $primaryKey = 'iduserrole';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name','status','deleted_by','deleted_at','created_at'];

    //protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    //protected $skipValidation     = false;
    

    function findrole($id){

        $this->db->select('*');
        $this->db->from('userrole');
       return $role = $this->db->where('iduserrole',$id);
    }

    function addrole($user_id_array){

      // return $user = $userModel->find($user_id);
    }

    public function getroles()
    {
        return $this->findAll();
        
    }
    
}