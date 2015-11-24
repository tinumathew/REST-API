<?php
require_once(APPPATH.'libraries/REST_Controller.php');

class RestController extends REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('RestModel');
    }
    public function createUser_post()
    {
        $data['name']=$this->post('name') ;
        $data['age']=$this->post('age') ;
        $data['email']=$this->post('email') ;
        $this->RestModel->insert($data);
        if($value==TRUE)
        {
            $result['message']="successfully inserted";
        }
        else
        {
            $result['message']="Insertion failed";
        }
        $this->response($result);
    }
    public function deleteUser_delete()
    {
        $header_params = apache_request_headers();
        $id=$header_params['id'];
        $value=$this->RestModel->delete($id);
        if($value==TRUE)
        {
            $result['message']="successfully deleted";
        }
        else
        {
            $result['message']="Deletion failed";
        }
        $this->response($result);
    }
    public function updateUser_put()
    {
        $id=$this->put('id');
        $name=$this->put('name');
        $value=$this->RestModel->update($id,$name);
        if($value==TRUE)
        {
            $result['message']="successfully updated";
        }
        else
        {
            $result['message']="updation failed";
        }
        $this->response($result);
    }
    public function viewUser_get()
    {
        $data=$this->RestModel->retrieve();       
        $this->response($data); 
    }
}