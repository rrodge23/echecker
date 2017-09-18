
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

	
}
