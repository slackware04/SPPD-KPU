<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function index($page='')
	{	
		$this->load->model('M_pegawai');
		$config['base_url'] = base_url() . 'Pegawai/index/';
		$config['total_rows'] = $this->M_pegawai->count_pegawai();
		$config['per_page'] = 4;
		$config['num_links'] = 2;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$page = ($page!='')? $page : 0;
		$config['cur_page'] = $page;
		
		
		
		$data_pegawai = $this->M_pegawai->get_all_pegawai_pagination($config['per_page'], $page);
		$data['data_pegawai'] = $data_pegawai;
		$data['title'] = 'Data Pegawai';
		$data['content'] = 'contents/pegawai/V_pegawai';
		$data['links'] = $this->pagination->create_links();
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		$data['title'] = 'Data Pegawai';
		$data['content'] = 'contents/pegawai/V_insertpegawai';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		//table pegawai
		$data['NIP'] = $this->input->post('param1');
		$data['Nama_Lengkap'] = $this->input->post('param2');
		$data['Pangkat_Golongan'] = $this->input->post('param3');
		$data['Jabatan'] = $this->input->post('param4');
		$data['Tingkat_Peraturan_Perjalanan_Dinas'] = $this->input->post('param5');
		$data['Tanggal_Lahir'] = $this->input->post('param6');
		$data['Unit_Kerja'] = $this->input->post('param7');
		
		$this->load->model('M_pegawai');
		$this->M_pegawai->add_pegawai($data);
		
		//table user
		$data_user['Username'] = $this->input->post('param1');
		$data_user['Password'] = '12345';
		$data_user['Nama_Lengkap'] = $this->input->post('param2');
		$data_user['Role'] = 'pegawai';
		
		$this->M_pegawai->add_user($data_user);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Pegawai'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_pegawai');
		$this->M_pegawai->delete_pegawai($id);
		$this->M_pegawai->delete_user($id);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully deleted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Pegawai'));
	}
	
}