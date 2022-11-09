<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'iduser';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['LoginID','Name', 'SurName','EmailID','Password','DisplayName','Gender','Phone','Mobile','Address1','Address2','idCountry','idState','idCity','idTimeZone','idLocale','Status','UserType','isSuperAdmin','DOB','UserRole','idUserRole','created_at'];

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

    function adduser($user_id_array){

      // return $user = $userModel->find($user_id);
    }

    public function getUsers($slug = false)
    {
        if ($slug === false) {
            return $this->orderBy('iduser', 'DESC')->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function updateUsers($id,$data ='')
    {
        
       return $this->update($id, $data);       
        
    }

    public function fetchcitiesbystate($id='')
    {
        $this->select('*');
        $this->table('cities');
        $cities = $this->where('state_id',$id);
            print_r($cities);exit;
        
    }

    
}