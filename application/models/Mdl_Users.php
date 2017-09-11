
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
        $query=$this->db->where('user_level','student')->get('users');
        return $query->result_array();
    }

    public function getAllProfessorsList(){
        $query=$this->db->where('user_level','professor')->get('users');
        return $query->result_array();
    }

    public function insertUsers($data=array()){
        $isDataValid = false;
        foreach($data as $index => $d){
            
            if($d[$index]['user_level'] == 1 || $d[$index]['user_level'] == 2){
                if($d[$index]['user'] != "" && $d[$index]['pass'] != "" && $d[$index]['firstname'] != "" && $d[$index]['lastname'] != ""){
                    if($this->db->where('user_level', $d[$index]['user_level'])->get('user_leveltbl')){
                        $isDataValid = true;
                        $userInfo = array('user'=>$d[$index]['user'],
                                            'pass'=>$d[$index]['pass'],
                                            'user_level'=>$d[$index]['user_level'],
                                            'status'=>'inactive'
                                        );
                        $this->db->insert('user',$userInfo);
                        $last_insert = $this->db->insert_id();

                        if($d[$index]['user_level'] == 1){

                            $studentInfo = array('id'=>$last_insert,
                                            'firstname'=>$d[$index]['firstname'],
                                            'middlename'=>$d[$index]['middlename'],
                                            'lastname'=>$d[$index]['lastname'],
                                            'course'=>$d[$index]['course'],
                                            'year_level'=>$d[$index]['year_level'],
                                        );
                            if(!($this->db->insert('student_informationtbl',$studentInfo))){
                                return false;
                            }
                            
                        }else{
                            $teacherInfo = array('id'=>$last_insert,
                                            'firstname'=>$d[$index]['firstname'],
                                            'middlename'=>$d[$index]['middlename'],
                                            'lastname'=>$d[$index]['lastname'],
                                        );
                            if(!($this->db->insert('teacher_informationtbl',$teacherInfo))){
                                return false;
                            }
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