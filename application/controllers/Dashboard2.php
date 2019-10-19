<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard2');

		if (!$this->ion_auth->logged_in()) {
        	redirect('/auth', 'refresh');
    	}
	}
}
