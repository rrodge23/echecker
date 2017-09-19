
<?php


class Schedules extends MY_Controller {

    function __contruct(){
        parent::__contruct();
    }

	public function index()
	{
		$this->load->model('mdl_schedules');
		$scheduleList = $this->mdl_schedules->getAllschedules();
		$this->_view('schedule',$scheduleList);

	}
    public function getAllschedules($data=false){
		$this->load->model('mdl_schedules');
		$schedules = $this->mdl_schedules->getAllschedules();
		echo json_encode($schedules);
	}
    public function addschedule($data=false){
		$this->load->model('mdl_schedules');
		$isscheduleAdded = $this->mdl_schedules->addschedule($_POST);
		echo json_encode($isscheduleAdded);
	}

    public function getscheduleInfoById($data=false){
		$this->load->model('mdl_schedules');
		$schedule = $this->mdl_schedules->getscheduleInfoById($_POST);
		echo json_encode($schedule);
	}

	public function updateschedule($data=false){
		$this->load->model('mdl_schedules');
		$isscheduleUpdated = $this->mdl_schedules->updateschedule($_POST);
		echo json_encode($isscheduleUpdated);
	}

	public function deleteschedule($data=false){
		$this->load->model('mdl_schedules');
		$isscheduleDeleted = $this->mdl_schedules->deleteschedule($_POST['id']);
		echo json_encode($isscheduleDeleted);
	}

	public function modalAddShedule(){
        $header = array("code");
        $htmlbody = '<form action="schedules/addschedule" method="post" onsubmit="return false;" id="mdl-frm-add-schedule">';
        foreach($header as $h){
            $htmlbody .= '<div class="input-group">
                           <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">' . ucwords($h) . '</div></span>
                           <input type="text" class="form-control" name="' . $h . '" aria-describedby="basic-addon1" required="required">
                        </div>';
        }
        
        $htmlbody .= '<div class="input-group">
                       <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">Day</div></span>
                       <select name="day[]" data-placeholder="Choose a day ..." style="width:350px;" multiple class="chzn-select">';
        $dayList = array("","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        foreach($dayList as $d){
            $htmlbody .= '<option value="'.$d.'">'.$d.'</option>';
        }               
        $htmlbody .=' </select>
                    </div>';
        $htmlbody .= '<div class="input-group">
                       <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">Time</div></span>
                       <input type="text" class="form-control datepicker" name="time" aria-describedby="basic-addon1" required="required">
                    </div>
                    </form>';
        $footer = '<button type="submit" form="mdl-frm-add-schedule" class="btn btn-primary btn-post-add-schedule"><i class="material-icons">playlist_add_check</i></button>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i></button>';
        echo json_encode(array('body'=>$htmlbody, 'footer'=>$footer));
    }

    public function modalUpdateSchedule(){
        $header = array("code","day");
        $htmlbody = '<form action="schedules/addschedule" method="post" onsubmit="return false;" id="mdl-frm-add-schedule">';
        foreach($header as $h){
            $htmlbody .= '<div class="input-group">
                           <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">' . ucwords($h) . '</div></span>
                           <input type="text" class="form-control datepicker" name="' . $h . '" aria-describedby="basic-addon1" required="required">
                        </div>';
        }
        $htmlbody .= '<div class="input-group">
                       <span class="input-group-addon" id="basic-addon1"><div style="width:100px;float:left;">Time</div></span>
                       <input type="text" class="form-control datepicker" name="time" aria-describedby="basic-addon1" required="required">
                    </div>
                    </form>';
        $footer = '<button type="submit" form="mdl-frm-add-schedule" class="btn btn-primary btn-post-add-schedule"><i class="material-icons">playlist_add_check</i></button>
                   <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="material-icons">close</i></button>';
        echo json_encode(array('body'=>$htmlbody, 'footer'=>$footer));
    }

}
