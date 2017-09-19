
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
    
        $queryResult = $this->db->where('code',$data['code'])->get('subjecttbl');
        if($queryResult->row_array()){
            return array("Duplicate Subject Code",false);
        }
        
        $queryResult = $this->db->insert('subjecttbl',$data);
        if($queryResult){
            if(isset($data['schedule'])){
                $last_insert = $this->db->insert_id();

                $isUpdated = $this->db->set('status','unavailable')
                                    ->where('idschedule',$data['schedule'])
                                    ->update('subject_scheduletbl');
                if($isUpdated){
                    return array("",true);
                }
            }
        }else{
            return array("Error in Inserting Subject",false);
        }
        return array("",false);
        
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
        $queryGetSubject = $this->db->where('idsubject',$data)->get('subjecttbl');
        if($subjectInfo = $queryGetSubject->row_array()){
            $isSchedUpdate = $this->db->set('status','available')
                                    ->where('idschedule',$subjectInfo['schedule'])
                                    ->update('subject_scheduletbl');
            if($isSchedUpdate){
                $query=$this->db->where('idsubject',$data)
                        ->delete('subjecttbl');
                if($query){
                    return array("", true);   
                }else{
                    return array("Error in Record Deletion", false);  
                }
             
            }
        }
        
        return array("",false);
    }

}


?>