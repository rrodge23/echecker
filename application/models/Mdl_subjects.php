
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_subjects extends CI_Model {

    function __construct(){
        parent::__construct();
    }
   
    public function getAllSubjectList(){
        $query=$this->db->get('subjecttbl');
        return $query->result_array();
    }

    public function addSubject($data=false){
       
        return array($this->db->insert('subjecttbl',$data),true);
     
    }
    
    public function getSubjectInfoById($data=false){
      
        $query=$this->db->where('idsubject',$data['id'])
                    ->get('subjecttbl');
        $getSubject = $query->row_array();
        if($getSubject){
            return array($getSubject, true);   
        }else{
            return array("No Subject Found",false);
        }
        return array("",false);
    }

    public function updateSubject($data=false){
      
        $query=$this->db->not_like('idsubject',$data['idsubject'])
                    ->where('code',$data['code'])
                    ->get('subjecttbl');
         if($getSubject = $query->row_array()){
            return array("Subject Already Exist", false);   
        }else{
            if($isUpdated = $this->db->set($data)->where('idsubject',$data['idsubject'])->update('subjecttbl')){
                return array($isUpdated,true);
            }else{
                return array("Failed to Update Subject", false);
            }
        }               
        return array("",false);
    }
    
    public function deleteSubject($data=false){
      
        $query=$this->db->where('idsubject',$data)
                    ->delete('subjecttbl');
        if($query){
            return array("", true);   
        }else{
            return array("Error in Record Deletion", false);   
        }               
        return array("",false);
    }

}


?>