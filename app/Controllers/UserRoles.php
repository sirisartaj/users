<?php 
namespace App\Controllers;
use App\Models\UserRoleModel;
use CodeIgniter\Controller;
class UserRoles extends Controller
{
    // show users list
    public function index(){
        $UserRoleModel = new UserRoleModel();
        $data['roles'] = $UserRoleModel->orderBy('iduserrole', 'DESC')->findAll();
        
        return view('roles_list', $data);
    }
    // add user form
    public function create(){
        return view('setupRole');
    }
 
    // insert data
    public function store() {
        $UserRoleModel = new UserRoleModel();
        

        $data = [            
            'name' => $this->request->getVar('name'),
            'status' => 0            
        ];
        $UserRoleModel->insert($data);
        return $this->response->redirect(site_url('/rolesList'));
    }
    // show single role
    public function singleRole($id = null){
        $UserRoleModel = new UserRoleModel();
        $data['role_obj'] = $UserRoleModel->where('iduserrole',$id)->first();

        return view('edit_role', $data);
    }
    // update role data
    public function update(){
        $UserRoleModel = new UserRoleModel();
        $id = $this->request->getVar('iduserrole');
        $data = [
            'name' => $this->request->getVar('name'),
            'updated_at'  => date("Y-m-d H:i:s"),
        ];
        $UserRoleModel->update($id, $data);
        return $this->response->redirect(site_url('/rolesList'));
    }
 
    // delete role
    public function delete($id = null){
        
        $UserRoleModel = new UserRoleModel();
        $data = [
            'status' => 9,
            'deleted_at'  => date("Y-m-d H:i:s"),
            'deleted_by'  => 1,
        ];
        $UserRoleModel->update($id, $data);
        $data['role'] = $UserRoleModel->where('iduserrole', $id)->delete($id);
        return $this->response->redirect(site_url('/rolesList'));
    }


    public function rolePrivileges(){


        return view('edit_role', $data);


    }


}