<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Login Page';
		$data['content'] = 'contents/V_login';
		$this->load->view('layouts/V_backoffice_login', $data);
	}
	
	function do_login()
	{
		//$check = true;
		/* Login Logic Here */
		$username = $this->input->post('param1');
		$password = $this->input->post('param2');
		
		$this->load->model('M_login');
		$login = $this->M_login->check_login_data($username, $password);
		if($login == true)
		{
			//echo 'betul';
			$login_data = $this->M_login->get_login_data($username);
			foreach($login_data as $row)
			{
				
				$this->session->set_userdata('username', $row['Username']);
				$this->session->set_userdata('name', $row['Nama_Lengkap']);
				$this->session->set_userdata('role', $row['Role']);
				//if($row['Role'] == 'superadmin')
				if($row['Role'] == 'Superadmin')
				{
					//redirect(base_url('Home/superadmin'));
					redirect(base_url('Home'));
				}
				else
				{
					redirect(base_url('Home'));
					//echo $row['Role'];
				}
			}
		}
		else
		{
			//echo 'salah';
			$error_login = '<div class="error-login">Maaf Login Anda Salah</div>';
			$this->session->set_flashdata('error_login', $error_login);
			redirect(base_url('Login'));
		}
	}
	function do_logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		
		redirect(base_url('Login'));
	}
}