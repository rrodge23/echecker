
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Users extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    public function validateLogin($data=array()){
        
        $query = $this->db->where('user', $data['username'])
                        ->where('pass', $data['password'])
                        ->join('user_leveltbl', 'users.user_level = user_leveltbl.user_level')
                        ->get('users');
        $usersData = $query->first_row('array');
        if($usersData['user_level'] == "99"){
            $query = $this->db->where('idadmin',$usersData['idusers'])->get('admin_informationtbl');
            $adminInformation = $query->first_row('array');
        }
        if($usersData){
            $result = array($usersData,$adminInformation);
            return $result;
        }
       
        return false;
    }       

    public function getAllUserList(){
        $query=$this->db->get('users');
        return $query->result_array();
    }

    public function getAllStudentsList(){
        $query=$this->db->join('user_leveltbl','user_leveltbl.user_level = users.user_level')
                    ->join('student_informationtbl','student_informationtbl.id = users.idusers')
                    ->where('users.user_level','1')
                    ->get('users');
        return $query->result_array();
    }

    public function getAllProfessorsList(){
        $query=$this->db->join('user_leveltbl','user_leveltbl.user_level = users.user_level')
                    ->join('teacher_informationtbl','teacher_informationtbl.id = users.idusers')
                    ->where('users.user_level', '2')
                    ->get('users');
        return $query->result_array();
    }

    public function insertUsers($data=array()){
        
        $isDataValid = false;
        $studentDataIndex = array('firstname','middlename','lastname');
        $teacherDataIndex = array('firstname','middlename','lastname');
        
        if($data['user_level'] == 1 || $data['user_level'] == 2){
            if($data['user'] != "" && $data['pass'] != "" && $data['firstname'] != "" && $data['lastname'] != ""){
                if($this->db->where('user_level', $data['user_level'])->get('user_leveltbl')){
                    $isDataValid = true;
                    $userInfo = array('user'=>$data['user'],
                                        'pass'=>$data['pass'],
                                        'user_level'=>$data['user_level'],
                                        'status'=>'inactive'
                                    );
                    $this->db->insert('users',$userInfo);
                    $last_insert = $this->db->insert_id();

                    if($data['user_level'] == 1){
                        $studentInfo['id'] = $last_insert;
                        for($i = 0; $i< count($studentDataIndex); $i++){
                            $studentInfo[$studentDataIndex[$i]] = $data[$studentDataIndex[$i]];
                        }
                        
                        if(!($this->db->insert('student_informationtbl',$studentInfo))){
                            return false;
                        }
                        
                    }else{
                        $teacherInfo['id'] = $last_insert;
                        for($i = 0; $i < count($teacherDataIndex); $i++){
                            $teacherInfo[$teacherDataIndex[$i]] = $data[$teacherDataIndex[$i]];
                        }
                        if(!($this->db->insert('teacher_informationtbl',$teacherInfo))){
                            return false;
                        }
                    }
                    
                }
            }
        }
        
         return $isDataValid;
    }

    public function deleteUserById($id=false){
        return $this->db->where('UID',$id)->delete('users');
    }

    public function getUserInfoById($data=false){
        $user = $this->db->where('UID',$data)->get('users');
        if($user){
            return $user->row_array();
        }
        return false;
    }

    public function updateUser($data=false){
        $user = array('user'=>$data['user'],'user_level'=>$data['user_level']);
        return $query = $this->db->set($user)->where('UID', $data['UID'])->update('users');
    }

    public function changePassword($data=array()){
        $query = $this->db->set('pass',$data['newPassword'])->set('status','active')->where('idusers',$data['idusers'])->update('users');
        if($query){ 
            return $data['newPassword'];
        }else
        {
            return false;
        }
    }
    
}


?>