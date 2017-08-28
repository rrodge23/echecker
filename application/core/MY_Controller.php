
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();
    }


    public function _view($pages='home',$data=array()){
        if(!file_exists(APPPATH . 'views/pages/' . $pages . '.php')){
            show_404();
        }
        $path['currentPath'] = $this->uri->segment(1);
       
        $this->load->view('layouts/header',$path);
        $this->load->view('pages/'. $pages,$data);
        $this->load->view('layouts/footer',$path);

    }
}
