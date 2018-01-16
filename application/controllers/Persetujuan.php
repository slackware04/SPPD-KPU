<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persetujuan extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_persetujuan');
		$role = $this->session->userdata('role');
		$list_surat = $this->M_persetujuan->list_acc($role);
		$data['list_surat'] = $list_surat;
		$data['title'] = 'Daftar Persetujuan Dokumen';
		$data['content'] = 'contents/persetujuan/V_persetujuan';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function acc($no_surat)
	{
		$this->load->model('M_persetujuan');
		$this->M_persetujuan->give_acc($no_surat);
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Persetujuan telah diberikan!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Persetujuan'));
	}
	
	
	
	
}