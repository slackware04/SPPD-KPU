<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratTugas extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_surattugas');
		$data_surat = $this->M_surattugas->get_all_surat();
		//$jumlah_pegawai = $this->M_surattugas->get_all_surat();
		$data['data_surat'] = $data_surat;
		$data['title'] = 'Daftar Surat Tugas';
		$data['content'] = 'contents/surattugas/V_surattugas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		$this->load->model('M_pejabat');
		$daftar_pejabat = $this->M_pejabat->get_all_pejabat();
		$data['daftar_pejabat'] = $daftar_pejabat;
		$data['title'] = 'Daftar Surat Tugas';
		$data['content'] = 'contents/surattugas/V_insertsurattugas';
		$this->load->view('layouts/V_backoffice', $data);
	}

	public function insert()
	{
		$data['Nomor_Surat_Tugas'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Tanggal_Surat_Tugas'] = $this->input->post('param2');
		$data['Maksud_Perjalanan_Dinas'] = $this->input->post('param3');
		$data['Tujuan_Perjalanan_Dinas'] = $this->input->post('param4');
		$data['Angkutan'] = $this->input->post('param5');
		$data['Tanggal_Berangkat'] = $this->input->post('param6');
		$data['Tanggal_Kembali'] = $this->input->post('param7');
		$data['Dasar_Surat'] = $this->input->post('paramX');
		$jumlah_pegawai = $this->input->post('param8');
		
		$data['Lama_Perjalanan_Dinas'] = 'haha';
		
		$this->load->model('M_surattugas');
		$this->M_surattugas->add_surat($data);
		
		$data_acc['Nomor_Surat'] = str_replace("/", "-", $this->input->post('param1'));
		$data_acc['Jenis_Surat'] = 'Surat Tugas';
		$data_acc['Pejabat_yang_Menandatangani'] = $this->input->post('param9');
		$data_acc['Kewenangan'] = 'all';
		$data_acc['Status'] = 'belum acc';
		$this->load->model('M_persetujuan');
		$this->M_persetujuan->add_acc($data_acc);
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratTugas/form_pegawai/'. $data['Nomor_Surat_Tugas'] . '/' . $jumlah_pegawai));
	}
	
	public function form_pegawai($no_surat, $jml_pegawai)
	{
		$this->load->model('M_pegawai');
		$daftar_pegawai = $this->M_pegawai->get_all_pegawai();
		$data['daftar_pegawai'] = $daftar_pegawai;
		$data['no_surat'] = str_replace("-", "/", $no_surat);
		$data['jumlah_pegawai'] = $jml_pegawai;
		$data['title'] = 'Daftar Pegawai Berangkat';
		$data['content'] = 'contents/surattugas/V_insertpegawaist';
		$this->load->view('layouts/V_backoffice', $data);
		
	}
	
	public function insert_pegawai($no_surat, $jml_pegawai)
	{
		$this->load->model('M_surattugas');
		$i = 1;
		while($i <= $jml_pegawai)
		{
			$data['Nomor_Surat_Tugas'] = $no_surat;
			$data['NIP'] = $this->input->post('param'.$i);
			$this->M_surattugas->add_pegawai($data);
			$i++;
		}
		$message = '<div class="alert alert-dismissible alert-success">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data has successfully inserted!.
		</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratTugas'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_surattugas');
		$this->load->model('M_persetujuan');
		$this->M_surattugas->delete_surat($id);
		$this->M_surattugas->delete_pegawai($id);
		$this->M_persetujuan->remove_acc($id);
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratTugas'));
	}
	
	public function detail($id)
	{
		$this->load->model('M_surattugas');
		$detail_st = $this->M_surattugas->get_specific_surat($id);
		$data['detail_st'] = $detail_st;
		$pegawai_bertugas = $this->M_surattugas->get_pegawai_bertugas(str_replace("/", "-", $id));
		$data['pegawai_bertugas'] = $pegawai_bertugas;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Surat Tugas');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
		
		$data['title'] = 'Detail Surat Tugas';
		$data['content'] = 'contents/surattugas/V_detailsurattugas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function exportPDF($id)
	{
		$this->load->model('M_surattugas');
		$detail_st = $this->M_surattugas->get_specific_surat($id);
		$data['detail_st'] = $detail_st;
		$pegawai_bertugas = $this->M_surattugas->get_pegawai_bertugas(str_replace("/", "-", $id));
		$data['pegawai_bertugas'] = $pegawai_bertugas;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Surat Tugas');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
	
		$this->load->helper('pdf_helper');
		$data['title'] = 'PDF';
		$this->load->view('contents/surattugas/v_exportpdf', $data);
		
		
		
	}
}