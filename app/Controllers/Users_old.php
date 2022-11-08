<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\NewsModel;
class Users extends BaseController
{

    protected $helpers = ['url', 'form'];
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        $this->request = $request;
        $this->UserModel = model(UserModel::class);
        // Add your code here.
    }

    public function index()
    {
        
        $data['Headding'] = 'Users';
        return view('users_list',$data);
        //return view('welcome_message');
    }
    public function setupUser()
    {
         
        
        if($_POST){
           // print_r($_POST);//exit;
        }        
       
        $this->request->getVar(NULL, TRUE); // returns all POST items with XSS filter
                
        
       /* $this->form_validation->set_rules('displayName', 'Display Name', 'trim|required');
        $this->form_validation->set_rules('firstName', 'Given Name', 'trim|required');
        $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');     
        $this->form_validation->set_rules('email', 'Email', 'trim|required');     
        $this->form_validation->set_rules('Address1', 'Address1', 'trim|required'); 
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');  
        $this->form_validation->set_rules('City', 'City', 'trim|required');
        $this->form_validation->set_rules('State', 'State', 'trim|required');
        $this->form_validation->set_rules('PIN', 'Pincode', 'trim|required|integer|is_natural|exact_length[6]');
        //$this->form_validation->set_rules('Phone', 'Work Phone', 'trim|required|integer|is_natural|min_length[8]|max_length[12]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|integer|is_natural|exact_length[10]');
        //$this->form_validation->set_rules('Status', 'Status', 'trim');  
        
        if($userId) {
            //$this->form_validation->set_rules('LoginID', 'Email', 'trim|required|valid_email');
        } else {        
            //$this->form_validation->set_rules('LoginID', 'Email', 'trim|required|valid_email|is_unique[user.LoginID]');
            //$this->form_validation->set_message('is_unique', 'This {field} is already registered.Please enter another email.'); 
            // password validations for new user
            //$this->form_validation->set_rules('Password', 'Password', 'required');  
           // $this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'required|matches[Password]');     
        }
        */
        if($this->request->getVar(NULL, TRUE)){


        // if the valid inputs then logged into the code
        if (! $this->validate([
            'email' => "required",
            'name'  => 'required|alpha_numeric_spaces',
        ])) {
            //echo "aaaaa";exit;
            return view('setupUser', [
                'errors' => $this->validator->getErrors(),
            ]);
        }

}

        //if ($this->form_validation->run()) {
            
            
            $updateData['displayName']  = $this->request->getVar('displayName');
            $updateData['firstName']     = $this->request->getVar('firstName');
            $updateData['lastName']    = $this->request->getVar('lastName');
            $updateData['email']      = $this->request->getVar('email');
            $updateData['password']     = md5($this->request->getVar('password'));
            $updateData['mobile']     = $this->request->getVar('mobile');
            $updateData['address1']     = $this->request->getVar('address1');
            $updateData['address2']     = $this->request->getVar('address2');
            $updateData['city']         = $this->request->getVar('city');
            $updateData['state']        = $this->request->getVar('state');
            $updateData['pin']          = $this->request->getVar('pin');            
            $updateData['userrole']      = $this->request->getVar('userrole');        
            $updateData['gender']      = $this->request->getVar('gender');        
            $updateData['LoginID']      = $this->request->getVar('LoginID');

            


            $a = $this->UserModel->finduser(1);
            print_r($a); echo "sartaj";exit;
echo "<pre>";
            print_r($updateData);

            //$updateData['Phone']      = $this->request->getVar('Phone');
            //$updateData['Mobile']         = $this->request->getVar('Mobile');
             //$updateData['country_code']      = $this->request->getVar('country_code');
             //$updateData['idCountry']       = $this->request->getVar('idCountry');
            
         /*   //$updateData['Mobile']=$this->request->getVar('country_code').$this->request->getVar('Mobile');
            
            if(!$userId) {
                $updateData['password']     = md5($this->request->getVar('password'));
            }
            if(!$userId) {
                $updateData['addedDate']    = date('Y-m-d H:i:s');
            }
            $updateData['modifiedDate'] = date('Y-m-d H:i:s');
            $updateData['Status']       = $this->request->getVar('Status');
            $updateData['UserType']     = "Admin";
            
            if($updateData['Status'] == 'No') {
                $updateData['Status']='Inactive';
            }else
            { 
                $updateData['Status']='Active';
            }
            $sessData = $this->session->userdata();
            // get the session user data
            $sessUserData =  isset($sessData['user_data']) ? $sessData['user_data'] : "";
            $isSuperAdmin = $sessUserData['isSuperAdmin'] ? $sessUserData['isSuperAdmin'] : 0;
            if(!$isSuperAdmin){
                $updateData['idUserLastModifiedAdmin']=$this->_userId;
            }
            //print_r($updateData);
            //echo "--->";
            //echo $userId;die;
            //this is if conndition is due to the 1 is oldsuperadmin so if userid oldsuperadmin is updating to aviod it making zero
            
            if($userId==1)
            {
                $userId=0;
            }
            $res = $this->usermodel->updateUserData($updateData, $userId);
            
            if($res == 'update') { 
                $data['message'] = "User has been updated successfully.";
            } else {                        
                $data['userId'] = $res;
                $data['message'] = "User has been added successfully.";
            }
            session_start();
            $this->session->set_flashdata('message', $data['message']);
            session_write_close();
            $url = base_url()."users";
            redirect($url);
        } else {
            $data['validationError'] = 1;
        }
        
        // pagination start
        $config['base_url']         = base_url()."users/setupUser/$userId/$searchUserName/";
        $config['total_rows']       =  $this->usermodel->getUsersCount($entityId, $searchData);
        $config['per_page']         = $this->_per_page;
        $config["uri_segment"]      = $this->_uri_segment;
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a>';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['full_tag_open']    = '<ul class="pagination pagination-sm">';
        $config['full_tag_close']   = '</ul>';
        $config['first_tag_open']   = '<li>';       
        $config['first_tag_close']  = '</li>';      
        $config['last_tag_open']    = '<li>';       
        $config['last_tag_close']   = '</li>';

        $this->pagination->initialize($config);

        $data['page'] = ($offset) ? $offset : $this->uri->segment($this->_uri_segment);     
        $data['pagination'] = $this->pagination->create_links(); 
        // end of pagination*/
        
        // get the user data by using pagination
        //$data['userData'] = $this->usermodel->getUsers($config["per_page"], $data['page'], $entityId, $searchData);
      
            
        
     





        return view('setupUser');
    }


    function userlist(){
        $getall = $this->UserModel->getUsers();
            print_r($getall);
            return view('userslist');
    }
}
