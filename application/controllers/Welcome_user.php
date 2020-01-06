<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



	}

	public function index()
	{
		

		$data['contents'] = 'templete_user/content/dashboard';
		$this->load->view('templete_user/index',$data);



	}


	

}
