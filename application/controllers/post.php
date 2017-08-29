
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {


	public function index($pages='login')
	{
		$this->_view($pages, array());
	}
    
	public function login(){
		echo json_encode('asfasf');
	}
}
