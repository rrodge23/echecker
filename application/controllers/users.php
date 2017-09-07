
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
        $studentHtml="";
        $professorHtml="";
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            for($row=1; $row<=$highestRow; $row++){
                $id = $worksheet->getCellByColumnAndRow(0,$row);
                $user = $worksheet->getCellByColumnAndRow(1,$row);
                $pass = $worksheet->getCellByColumnAndRow(2,$row);
                $firstname = $worksheet->getCellByColumnAndRow(3,$row);
                $middlename = $worksheet->getCellByColumnAndRow(4,$row);
                $lastname = $worksheet->getCellByColumnAndRow(5,$row);
                $user_level = $worksheet->getCellByColumnAndRow(6,$row);
                $year_level = $worksheet->getCellByColumnAndRow(7,$row);
                if($user != "" && $firstname != ""){
                    $userInfo = array("user"=>$user, 
                                    "pass"=> "",
                                    "firstname"=>$firstname,
                                    "middlename"=>$middlename,
                                    "lastname"=>$lastname,
                                    "user_level"=>$user_level,
                                    "year_level"=>$year_level,
                                    "status"=>'inactive'
                                    );
                    $this->load->model("mdl_Users");
                    $result = $this->mdl_Users->insertUsers($userInfo);
                }   
            }
        }
        echo json_encode($result);
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
