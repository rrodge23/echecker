
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
            $highestColumnLetter = $worksheet->getHighestDataColumn();
            $highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumnLetter);
            $header = array('user','pass','user_level','status','firstname','middlename','lastname');
            for($row=2; $row<=$highestRow; $row++){
                $colDatas = array();
                for($col=0;$col<$highestColumn-2;$col++){ 
                    $colDatas[$header[$col]] = $worksheet->getCellByColumnAndRow($col,$row)->getFormattedValue();
                }
               
                $this->load->model("mdl_Users");
                $result = $this->mdl_Users->insertUsers($colDatas);
                if($result){
                    $isInsertSuccess = true;    
                }                    
                
            }
            break;
        }
       echo json_encode($isInsertSuccess);
       
    }

    
    public function deleteUser(){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->deleteUserById($_POST['id']);
        echo json_encode($result);
    }
    public function addTeacher(){
        $this->load->model('mdl_Users');
        $_POST['user_level'] = "2";
        $result = $this->mdl_Users->insertUsers($_POST);
        echo json_encode($result);
    }
    public function addStudent(){
        $this->load->model('mdl_Users');
        $_POST['user_level'] = "1";
        $result = $this->mdl_Users->insertUsers($_POST);
        echo json_encode($result);
    }

    public function updateUser(){
        $this->load->model('mdl_Users');
        $query = $this->mdl_Users->updateUser($_POST);
        echo json_encode($query);
    }

    public function getUserInfoById($data=false){
        $this->load->model('mdl_Users');
        $result = $this->mdl_Users->getUserInfoById($_POST['id']);
        echo json_encode($result);
    }

}
