<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
		
	public function index()
	{
		$username = $this->session->userdata('name');
		$data['title'] = 'Beranda';
		$data['content'] = 'contents/V_homepage';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function superadmin()
	{
		
		$username = $this->session->userdata('name');
		
		$data['title'] = 'Beranda';
		$data['content'] = 'contents/V_homepage_superadmin';
		$this->load->view('layouts/V_backoffice', $data);
		
	}
}





