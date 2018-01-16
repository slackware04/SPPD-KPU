<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entitas extends CI_Controller
{
	public function index()
	{
		$this->load->model('M_entitas');
		$check_entitas = $this->M_entitas->check_entitas();
		$data['check_entitas'] = $check_entitas;
		$data_entitas = $this->M_entitas->get_entitas();
		$data['data_entitas'] = $data_entitas;
		$data['title'] = 'Data Entitas';
		$data['content'] = 'contents/entitas/V_entitas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		$data['title'] = 'Data Entitas';
		$data['content'] = 'contents/entitas/V_insertentitas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		$data['Nama_Entitas'] = $this->input->post('param1');
		$data['Alamat_Entitas_1'] = $this->input->post('param2');
		$data['Alamat_Entitas_2'] = $this->input->post('param3');
		$data['No_Telp'] = $this->input->post('param4');
		$data['No_Fax'] = $this->input->post('param5');
		$data['Kode_Pos'] = $this->input->post('param6');
		$data['Naskah_Hibah_1'] = $this->input->post('param7');
		$data['Tanggal_Hibah_1'] = $this->input->post('param8');
		$data['Naskah_Hibah_2'] = $this->input->post('param9');
		$data['Tanggal_Hibah_2'] = $this->input->post('param10');
		$data['Tahun_Anggaran'] = $this->input->post('param11');
		
		$this->load->model('M_entitas');
		$this->M_entitas->add_entitas($data);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Entitas'));
	}
	
	public function reset()
	{
		$this->load->model('M_entitas');
		$this->M_entitas->delete_entitas();
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully deleted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Entitas'));
	}

}