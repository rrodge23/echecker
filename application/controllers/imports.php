
<?php


class Imports extends MY_Controller {

    function __contruct(){
        parent::__contruct();
    }

	public function index()
	{
		$this->_view('import');
	}

    public function importField(){
        $this->load->library("Excelfile");
        $object = PHPExcel_IOFactory::load($_FILES["usersFile"]["tmp_name"]);
        $isInsertSuccess = false;
        foreach($object->getWorksheetIterator() as $worksheet){
            $highestRow = $worksheet->getHighestRow();
            $header = array('code','user','user_level','firstname','middlename','lastname');
            for($row=2; $row<=$highestRow; $row++){
                $colDatas = array();
                for($col=0;$col< 2;$col++){ 
                    $colDatas['year_level'] = $worksheet->getCellByColumnAndRow($col,$row)->getFormattedValue();
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
       echo json_encode($_POST['field']);
    }
}
