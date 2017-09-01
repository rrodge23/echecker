
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    function __contruct(){
        parent::__contruct();
        $this->load->library('session');
        
    }

	public function index()
	{
		session_destroy();
        unset($_SESSION);
        redirect('login','refresh');
	}

}
