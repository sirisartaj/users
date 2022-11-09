<?php 
namespace App\Controllers;
use App\Models\UserRoleModel;
use App\Models\roleprivilegesModel;
use App\Models\accessrightsModel;
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
            'status' => $this->request->getVar('status'),           
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
            'status' => $this->request->getVar('status'),
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


    public function rolePrivileges($roleid=''){

        $roleprivilegesModel = new roleprivilegesModel();
        $accessrightsModel = new accessrightsModel();
        if($_REQUEST){
            
            $roleid = $this->request->getVar('iduserrole');
            $roleprivilegesModel->where('iduserrole', $roleid)->delete();
            foreach($_REQUEST['accessright'] as $accessright){
                $data = [
                    'iduserrole' => $roleid,
                    'idaccessright' => $accessright          
                    ];
                $roleprivilegesModel->insert($data);
            }           

            return $this->response->redirect(site_url('/rolesList'));
        }

        $data['roleid']=$roleid;
        $data['headding'] ='rolePrivileges';
        $data['accessrights'] = $accessrightsModel->findAll();
        $data['roleprivilegeslist'] = $roleprivilegesModel->getroleprivileges($roleid);

        return view('rolePrivileges_view', $data);


    }


}