
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Users extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    public function validateLogin($data=array()){
        $this->db->where('user', $data['username'])->where('pass', $data['password']);
        $query=$this->db->get('users');
        return $query->row_array();
    }

    public function getAllUserList(){
        $query=$this->db->get('users');
        return $query->result_array();
    }

    public function insertUsers($data=false){
        $user = $this->db->where('user',$data['user'])->get('users');
        if($user){
            return false;
        }else{
            return $this->db->insert('users',$data);
        }
        
    }

    public function deleteUserById($id=false){
        $user = $this->db->where('UID',$id)->get('users');
        if($user){
            return $this->db->where('UID',$id)->delete('users');
        }
        return false;
    }
}


?>