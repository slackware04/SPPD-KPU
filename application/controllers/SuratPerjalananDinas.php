<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratPerjalananDinas extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_suratperjalanandinas');
		$data_surat = $this->M_suratperjalanandinas->get_all_surat();
		//$jumlah_pegawai = $this->M_surattugas->get_all_surat();
		$data['data_surat'] = $data_surat;
		$data['title'] = 'Daftar Surat Perjalanan Dinas';
		$data['content'] = 'contents/suratperjalanandinas/V_suratperjalanandinas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form()
	{
		$this->load->model('M_surattugas');
		$daftar_surat = $this->M_surattugas->get_all_surat();
		$data['daftar_surat'] = $daftar_surat;
		$this->load->model('M_pegawai');
		$daftar_pegawai = $this->M_pegawai->get_all_pegawai();
		$data['daftar_pegawai'] = $daftar_pegawai;
		$this->load->model('M_anggaran');
		$daftar_mak = $this->M_anggaran->get_all_anggaran();
		$data['daftar_mak'] = $daftar_mak;
		$this->load->model('M_pejabat');
		$daftar_pejabat = $this->M_pejabat->get_all_pejabat();
		$data['daftar_pejabat'] = $daftar_pejabat;
		$data['title'] = 'Daftar Surat Perjalanan Dinas';
		$data['content'] = 'contents/suratperjalanandinas/V_insertsuratperjalanandinas';
		$this->load->view('layouts/V_backoffice', $data);
	}

	public function insert()
	{
		$data['Nomor_Surat_Tugas'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Nama_Pelaksana_SPD'] = $this->input->post('param2');
		$data['Nomor_Surat_SPD'] = str_replace("/", "-", $this->input->post('param3'));
		$data['Tanggal_Surat_SPD'] = $this->input->post('param4');
		$data['Akun'] = $this->input->post('param5');
		$data['Keterangan_Lain'] = $this->input->post('param12');
		$this->load->model('M_suratperjalanandinas');
		$this->M_suratperjalanandinas->add_surat($data);
		
		$i = 1;
		$p = 6;
		while($i <= 5)
		{
			$data_acc['Nomor_Surat'] = str_replace("/", "-", $this->input->post('param3'));
			$data_acc['Jenis_Surat'] = 'Surat Perjalanan Dinas';
			$data_acc['Pejabat_yang_Menandatangani'] = $this->input->post('param'. $p);
			switch($p)
			{
				case 6:
					$data_acc['Kewenangan'] = 'Pemeriksa SPD';
					break;
				case 7:
					$data_acc['Kewenangan'] = 'Penandatangan SPD';
					break;
				case 8:
					$data_acc['Kewenangan'] = 'Pemberangkatan';
					break;
				case 9:
					$data_acc['Kewenangan'] = 'Kedatangan';
					break;
				case 10:
					$data_acc['Kewenangan'] = 'Pemeriksaan Berkas';
					break;
			}
			$data_acc['Status'] = 'belum acc';
			$this->load->model('M_persetujuan');
			$this->M_persetujuan->add_acc($data_acc);
			
			$i++;
			$p++;
		}
		
		$jumlah_pegawai = $this->input->post('param11');
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratPerjalananDinas/form_pegawai/'. $data['Nomor_Surat_SPD'] . '/' . $jumlah_pegawai));
	}
	
	public function form_pegawai($no_surat, $jml_pegawai)
	{
		$this->load->model('M_pegawai');
		$daftar_pegawai = $this->M_pegawai->get_all_pegawai();
		$data['daftar_pegawai'] = $daftar_pegawai;
		$data['no_surat'] = str_replace("-", "/", $no_surat);
		$data['jumlah_pegawai'] = $jml_pegawai;
		$data['title'] = 'Daftar Pegawai Berangkat';
		$data['content'] = 'contents/suratperjalanandinas/V_insertpegawaispd';
		$this->load->view('layouts/V_backoffice', $data);
		
	}
	
	public function insert_pegawai($no_surat, $jml_pegawai)
	{
		$this->load->model('M_suratperjalanandinas');
		$i = 1;
		while($i <= $jml_pegawai)
		{
			$data['Nomor_Surat_SPD'] = $no_surat;
			$data['Nama_Pengikut'] = $this->input->post('param'.$i);
			$data['Keterangan'] = $this->input->post('ket'.$i);
			$this->M_suratperjalanandinas->add_pegawai($data);
			$i++;
		}
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data has successfully inserted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratPerjalananDinas'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_suratperjalanandinas');
		$this->load->model('M_persetujuan');
		$this->M_suratperjalanandinas->delete_surat($id);
		$this->M_suratperjalanandinas->delete_pegawai($id);
		$this->M_persetujuan->remove_acc($id, 'Surat Perjalanan Dinas');
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('SuratPerjalananDinas'));
	}
	
	public function detail($id)
	{
		$this->load->model('M_suratperjalanandinas');
		$detail_spd = $this->M_suratperjalanandinas->get_specific_surat($id);
		$data['detail_spd'] = $detail_spd;
		$keluarga = $this->M_suratperjalanandinas->get_keluarga(str_replace("/", "-", $id));
		$data['keluarga'] = $keluarga;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Surat Perjalanan Dinas');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
		
		$data['title'] = 'Detail Surat Tugas';
		$data['content'] = 'contents/suratperjalanandinas/V_detailsuratperjalanandinas';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function exportPDF($id)
	{
		$this->load->model('M_suratperjalanandinas');
		$detail_spd = $this->M_suratperjalanandinas->get_specific_surat($id);
		$data['detail_spd'] = $detail_spd;
		$list_keluarga = $this->M_suratperjalanandinas->get_keluarga(str_replace("/", "-", $id));
		$data['list_keluarga'] = $list_keluarga;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Surat Perjalanan Dinas');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
	
		$this->load->helper('pdf_helper');
		$data['title'] = 'PDF';
		$this->load->view('contents/suratperjalanandinas/v_exportpdfspd', $data);
	}
	
}