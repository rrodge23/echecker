
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_schedules extends CI_Model {

    function __construct(){
        parent::__construct();
    }
   
    public function getAllschedules(){
        $query=$this->db->get('subject_scheduletbl');
        return $query->result_array();
    }

    public function addschedule($data=false){
        
        $query=$this->db->where('schedule_name',$data['schedule_name'])
                    ->get('subject_scheduletbl');
        if($query->num_rows > 0){
            return array('schedule Already Exist', false);   
        }else{
            return array($this->db->insert('subject_scheduletbl',$data),true);
        }
        return array("",false);
    }
    
    public function getscheduleInfoById($data=false){
      
        $query=$this->db->where('idschedule',$data['id'])
                    ->get('subject_scheduletbl');
        $getschedule = $query->row_array();
        if($getschedule){
            return array($getschedule, true);   
        }else{
            return array("No Found",false);
        }
        return array("",false);
    }

    public function updateschedule($data=false){
      
        $query=$this->db->not_like('idschedule',$data['idschedule'])
                    ->where('schedule_name',$data['schedule_name'])
                    ->get('subject_scheduletbl');
         if($getschedule = $query->row_array()){
            return array("schedule Already Exist", false);   
        }else{
            if($isUpdated = $this->db->set($data)->where('idschedule',$data['idschedule'])->update('subject_scheduletbl')){
                return array($isUpdated,true);
            }else{
                return array("Failed to Update", false);
            }
        }               
        return array("",false);
    }
    
    public function deleteschedule($data=false){
      
        $query=$this->db->where('idschedule',$data)
                    ->delete('subject_scheduletbl');
        if($query){
            return array("", true);   
        }else{
            return array("Error in Record Deletion", false);   
        }               
        return array("",false);
    }

}


?>