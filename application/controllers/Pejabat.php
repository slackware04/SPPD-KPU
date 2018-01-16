<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat extends CI_Controller
{
	public function index($page='')
	{
		$this->load->model('M_pejabat');
		$config['base_url'] = base_url() . 'Pejabat/index/';
		$config['total_rows'] = $this->M_pejabat->count_pejabat();
		$config['per_page'] = 4;
		$config['num_links'] = 2;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$page = ($page!='')? $page : 0;
		$config['cur_page'] = $page;
		
		$data_pejabat = $this->M_pejabat->get_all_pejabat_pagination($config['per_page'], $page);
		$data['data_pejabat'] = $data_pejabat;
		$data['title'] = 'Data Pejabat';
		$data['content'] = 'contents/pejabat/V_pejabat';
		$data['links'] = $this->pagination->create_links();
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		//panggil data pegawai untuk NIP & Nama
		$this->load->model('M_Pegawai');
		$data_pegawai = $this->M_Pegawai->get_all_pegawai();
		$data['data_pegawai'] = $data_pegawai;
		$data['title'] = 'Data Pejabat';
		$data['content'] = 'contents/pejabat/V_insertpejabat';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert()
	{
		//table pejabat
		$data['Kode_Nama_Jabatan'] = $this->input->post('param1');
		switch($data['Kode_Nama_Jabatan'])
		{
			case "KKPUX-001":
				$data['Nama_Jabatan'] = 'Ketua Komisi Pemilihan Umum Kabupaten Kota';
				break;
			case "WKKPU-002":
				$data['Nama_Jabatan'] = 'Wakil Ketua Komisi Pemilihan Umum Kabupaten Kota';
				break;
			case "SKKPU-003":
				$data['Nama_Jabatan'] = 'Sekretaris Komisi Pemilihan Umum Daerah Kabupaten Kota';
				break;
			case "KPAXX-004":
				$data['Nama_Jabatan'] = 'Kuasa Pengguna Anggaran';
				break;
			case "PPKXX-005":
				$data['Nama_Jabatan'] = 'Pejabat Pembuat Komitmen';
				break;
			case "BPXXX-006":
				$data['Nama_Jabatan'] = 'Bendahara Pengeluaran';
				break;
			case "KSBPD-007":
				$data['Nama_Jabatan'] = 'Kasubag Program dan Data';
				break;
			case "KSBTH-008":
				$data['Nama_Jabatan'] = 'Kasubag Teknis dan Hubmas';
				break;
			case "KSBHK-009":
				$data['Nama_Jabatan'] = 'Kasubag Hukum';
				break;
			case "KSBKH-010":
				$data['Nama_Jabatan'] = 'Kasubag Keuangan Hukum Logistik';
				break;
			case "AGKPU-011":
				$data['Nama_Jabatan'] = 'Anggota KPU 1';
				break;
			case "AGKPU-012":
				$data['Nama_Jabatan'] = 'Anggota KPU 2';
				break;
			case "AGKPU-013":
				$data['Nama_Jabatan'] = 'Anggota KPU 3';
				break;
			case "AGKPU-014":
				$data['Nama_Jabatan'] = 'Anggota KPU 4';
				break;
		}
		$data['NIP'] = $this->input->post('param2');
		
		$this->load->model('M_pejabat');
		$this->M_pejabat->add_pejabat($data);
		
		//table user
		$this->load->model('M_pegawai');
		$nama = $this->M_pegawai->get_specific_pegawai($this->input->post('param2'));
		$data_user['Username'] = $this->input->post('param1');
		$data_user['Password'] = '12345';
		$data_user['Nama_Lengkap'] = $nama->Nama_Lengkap;
		$data_user['Role'] = $this->input->post('param1');
		
		$this->M_pejabat->add_user($data_user);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Pejabat'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_pejabat');
		$this->M_pejabat->delete_pejabat($id);
		$this->M_pejabat->delete_user($id);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully deleted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('Pejabat'));
	}
	
}