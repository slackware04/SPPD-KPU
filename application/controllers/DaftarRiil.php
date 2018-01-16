<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarRiil extends CI_Controller
{
	public function index()
	{	
		$this->load->model('M_daftarriil');
		$data_laporan = $this->M_daftarriil->check_status();
		$data['data_laporan'] = $data_laporan;
		$data['title'] = 'Daftar Pengeluaran Riil';
		$data['content'] = 'contents/daftarriil/V_daftarriil';
		$this->load->view('layouts/V_backoffice', $data);
	}
	
	public function insert_form($no_laporan)
	{
		$this->load->model('M_pejabat');
		$daftar_pejabat = $this->M_pejabat->get_all_pejabat();
		$data['daftar_pejabat'] = $daftar_pejabat;
		$data['no_laporan'] = $no_laporan;
		$data['title'] = 'Daftar Pengeluaran Riil';
		$data['content'] = 'contents/daftarriil/V_insertdaftarriil';
		$this->load->view('layouts/V_backoffice', $data);
	}

	public function insert()
	{
		$data['Nomor_Surat_SPD'] = str_replace("/", "-", $this->input->post('param1'));
		$data['Tanggal_Laporan'] = $this->input->post('param2');
		$data['Pejabat_Pemeriksa'] = str_replace("/", "-", $this->input->post('param3'));
		$data['Pejabat_Mengetahui'] = $this->input->post('param4');

		$this->load->model('M_daftarriil');
		$this->M_daftarriil->add_laporan($data);
		
		$i = 1;
		$p = 3;
		while($i <= 2)
		{
			$data_acc['Nomor_Surat'] = str_replace("/", "-", $this->input->post('param1'));
			$data_acc['Jenis_Surat'] = 'Daftar Pengeluaran Riil';
			$data_acc['Pejabat_yang_Menandatangani'] = $this->input->post('param'. $p);
			switch($p)
			{
				case 3:
					$data_acc['Kewenangan'] = 'Pemeriksa SPD';
					break;
				case 4:
					$data_acc['Kewenangan'] = 'Penandatangan SPD';
					break;
			}
			$data_acc['Status'] = 'belum acc';
			$this->load->model('M_persetujuan');
			$this->M_persetujuan->add_acc($data_acc);
			
			$i++;
			$p++;
		}
		
		$jenis_biaya = $this->input->post('param5');
		
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data successfully saved!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('DaftarRiil/form_biaya/'. $data['Nomor_Surat_SPD'] . '/' . $jenis_biaya));
	}
	
	public function form_biaya($no_surat, $jenis_biaya)
	{
		
		$data['no_surat'] = str_replace("-", "/", $no_surat);
		$data['jenis_biaya'] = $jenis_biaya;
		$data['title'] = 'Daftar Pengeluaran Riil';
		$data['content'] = 'contents/daftarriil/V_insertpegawaidaftarriil';
		$this->load->view('layouts/V_backoffice', $data);
		
	}
	
	public function insert_biaya($no_surat, $jenis_biaya)
	{
		$this->load->model('M_daftarriil');
		$i = 1;
		while($i <= $jenis_biaya)
		{
			$data['Nomor_Surat_SPD'] = $no_surat;
			$data['Uraian_Biaya'] = $this->input->post('param'.$i);
			$data['Jumlah_Biaya'] = $this->input->post('biaya'.$i);
			$this->M_daftarriil->add_biaya($data);
			$i++;
		}
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data has successfully inserted!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('DaftarRiil'));
	}
	
	public function delete($id)
	{
		$this->load->model('M_daftarriil');
		$this->load->model('M_persetujuan');
		$this->M_daftarriil->delete_laporan($id);
		$this->M_daftarriil->delete_biaya($id);
		$this->M_persetujuan->remove_acc($id, 'Daftar Pengeluaran Riil');
		$message = '<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong><i class="glyphicon glyphicon-info-sign"></i> Success!</strong> Data telah sukses dihapus!.
						</div>';
		$this->session->set_flashdata('message', $message);
		redirect(base_url('DaftarRiil'));
	}
	
	public function exportPDF($id)
	{
		$this->load->model('M_daftarriil');
		$detail_dpr = $this->M_daftarriil->get_specific_laporan($id);
		$data['detail_dpr'] = $detail_dpr;
		$list_biaya = $this->M_daftarriil->get_biaya($id);
		$data['list_biaya'] = $list_biaya;
		//$pegawai_bertugas = $this->M_daftarriil->get_pegawai_bertugas(str_replace("/", "-", $id));
		//$data['pegawai_bertugas'] = $pegawai_bertugas;
		
		$this->load->model('M_persetujuan');
		$pejabat_berwenang = $this->M_persetujuan->list_specific_acc($id, 'Daftar Pengeluaran Riil');
		$data['pejabat_berwenang'] = $pejabat_berwenang;
	
		$this->load->helper('pdf_helper');
		$data['title'] = 'PDF';
		$this->load->view('contents/daftarriil/v_exportpdfdaftarriil', $data);
	}
	
}