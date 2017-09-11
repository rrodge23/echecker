
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __contruct(){
        parent::__contruct();
    }

	public function index()
	{
        $this->load->model('mdl_Users');
        $proffessors = $this->mdl_Users->getAllProfessorsList();
        $students = $this->mdl_Users->getAllStudentsList();
        $users = array($proffessors,$students);
		$this->_view('users',$users);
	}

    public function importUsers(){
        $this->load->library("Excelfile");
        $object = PHPExcel_IOFactory::load($_FILES["usersFile"]["tmp_name"]);
        $isInsertSuccess = false;
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $header = array();
            for($row=1; $row<=$highestRow; $row++){

                $datas = array();
                for($col=0;$col<=$highestColumn;$col++){
                    if($row != 1){
                        array_push($datas, array($header[$col] => $worksheet->getCellByColumnAndRow($col,$row)->getFormattedValue()));
                    }else{
                        array_push($header,strtolower($worksheet->getCellByColumnAndRow($col,1)->getFormattedValue()));        
                    }
                }
                
                if($row == 2){
                    echo json_encode($datas);
                    $this->load->model("mdl_Users");
                    $result = $this->mdl_Users->insertUsers($datas);
                    if($result){
                        $isInsertSuccess = true;
                    }
                }
            }
            
        }
       // echo json_encode($isInsertSuccess);
       
    }

    public function deleteUser(){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->deleteUserById($_POST['id']);
        echo json_encode($result);
    }

    public function updateUser(){
        $this->load->model('mdl_Users');
        $user = array('UID' => $_POST['UID'], 'user' => $_POST['user'], 'user_level' => $_POST['user_level']);
        $query = $this->mdl_Users->updateUser($user);
        $students = $this->mdl_Users->getAllStudentsList();
        $proffessors = $this->mdl_Users->getAllProfessorsList();
        echo json_encode($query);
    }

    public function getUserInfoById($data=false){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->getUserInfoById($_POST['id']);
        echo json_encode($result);
    }

}
