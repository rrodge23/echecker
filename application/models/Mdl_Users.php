
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Users extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    public function validateLogin($data=array()){
        $query = $this->db->where('user', $data['username'])->where('pass', $data['password'])->get('users');
        if($query){
            return $query->row_array();
        }
        return false;
    }

    public function getAllUserList(){
        $query=$this->db->get('users');
        return $query->result_array();
    }

    public function getAllStudentsList(){
        $query=$this->db->get('users');
        return $query->result_array();
    }

    public function getAllProfessorsList(){
        $query=$this->db->get('users');
        return $query->result_array();
    }
    public function insertUsers($data=false){
        return $this->db->insert('users',$data);
        
    }

    public function deleteUserById($id=false){
        $user = $this->db->where('UID',$id)->get('users');
        if($user){
            return $this->db->where('UID',$id)->delete('users');
        }
        return false;
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
        $query = $this->db->set('pass',$data['newPassword'])->set('status','active')->where('UID',$data['UID'])->update('users');
        if($query){ 
            return $data['newPassword'];
        }else
        {
            return false;
        }
    }
    
}


?>