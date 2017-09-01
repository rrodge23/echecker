
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
        $object = PHPExcel_IOFactory::load($_FILES['fileimportuser']['tmp_name']);
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            for($row=1; $row<=$highestRow; $row++){
                $ID = $worksheet->getCellByColumnAndRow(1,$row);
                $name = $worksheet->getCellByColumnAndRow(1,$row);
                $userInfo = array('UID' => $ID, 'user'=>$name);
                $this->load->model('mdl_Users');
                $result = $this->mdl_Users->insertUsers($userInfo);
            }
        }
        redirect($this->uri->uri_string());
        echo json_encode('');
    }

    public function deleteUsers(){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->deleteUserById($_POST['id']);
        echo json_encode($result);
    }
}
