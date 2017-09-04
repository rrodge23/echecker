
<?php


class Subjects extends MY_Controller {

    function __contruct(){
        parent::__contruct();
    }

	public function index()
	{
		$this->_view('subject');
	}

   
}
