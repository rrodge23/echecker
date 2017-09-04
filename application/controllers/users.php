
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
        $html="";
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            for($row=1; $row<=$highestRow; $row++){
                $id = $worksheet->getCellByColumnAndRow(1,$row);
                $name = $worksheet->getCellByColumnAndRow(2,$row);
                $level = $worksheet->getCellByColumnAndRow(3,$row);
                if($name != ""){
                    $userInfo = array("user"=>$name, "user_level"=>$level);
                    $this->load->model("mdl_Users");
                    $result = $this->mdl_Users->insertUsers($userInfo);
                    if($result){
                        $html.="<tr>  
                            <td class='text-center checked'>$id</td>
                            <td class='text-center'>$name</td>
                            <td class='text-center'>
                                <button data-id='$id' rel='tooltip' data-original-title='Update' class='btn-update-user btn btn-info' type='button' name='update' onclick='return false;'>
                                    <i class='material-icons'>create</i>
                                </button>
                                <button href='users/deleteuser' data-id='$id' rel='tooltip' data-original-title='Delete' class='btn-delete-user btn btn-danger' type='submit' name='deleteUser' onclick='return false;'>
                                    <i class='material-icons'>delete</i>
                                </button>
                            </td>
                        </tr>";
                    }
                }
                
            }
        }
       
        echo json_encode($html);
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
