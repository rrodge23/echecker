
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}
    public function view($pages='home'){
        $this->_view($pages,array());
    }

}
