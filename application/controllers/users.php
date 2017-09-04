
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __contruct(){
        parent::__contruct();
    }

	public function index()
	{
        $this->load->model('mdl_Users');
        
        $users = $this->mdl_Users->getAllUserList();
		$this->_view('users',$users);
	}

    public function importUsers(){
        $this->load->library("Excelfile");
        $object = PHPExcel_IOFactory::load($_FILES["usersFile"]["tmp_name"]);
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            for($row=1; $row<=$highestRow; $row++){
                $name = $worksheet->getCellByColumnAndRow(2,$row);
                $level = $worksheet->getCellByColumnAndRow(3,$row);
                $userInfo = array("user"=>$name, "user_level"=>$level);
                $this->load->model("mdl_Users");
                $result = $this->mdl_Users->insertUsers($userInfo);
            }
        }
       
        echo json_encode('');
    }

    public function deleteUser(){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->deleteUserById($_POST['id']);
        echo json_encode($result);
    }

    public function updateUser(){
        $this->load->model('mdl_Users');
        $user = array('UID' => $_POST['UID'], 'user' => $_POST['user'], 'user_level' => $_POST['user_level']);
        $result = $this->mdl_Users->updateUser($user);
        echo json_encode($result);
    }

    public function getUserInfoById($data=false){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->getUserInfoById($_POST['id']);
        echo json_encode($result);
    }

}
