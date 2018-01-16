<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
pdfInit();

class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
        // Logo
		$image_file = base_url('Assets/img/kpu.png');
        $this->Image($image_file, 0, 15, 15, 0, 'PNG', '', 'T', false, 300, 'C', false, false, 0, false, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 16);
        // Title
		$this->Cell(0, 15, '', 0, 1, 'C', false, '', 0, false, 'M', 'M');
		$this->Cell(0, 15, '', 0, 1, 'C', false, '', 0, false, 'M', 'M');
		$this->Cell(0, 15, '', 0, 1, 'C', false, '', 0, false, 'M', 'M');
        $this->Cell(0, 15, 'KOMISI PEMILIHAN UMUM', 0, 1, 'C', false, '', 0, false, 'M', 'M');
		$this->Cell(0, 15, 'KABUPATEN TANGERANG', 0, 1, 'C', false, '', 0, false, 'M', 'M');
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(0, 15, '', 0, 1, 'C', false, '', 0, false, 'M', 'M');
		$this->Cell(0, 15, 'Surat Perintah Tugas', 0, 1, 'C', false, '', 0, false, 'M', 'M');
    }
}
$obj_pdf = new mypdf('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage($orientation = 'P');
ob_start();
	//BEGIN OF CONTENT
	foreach($detail_st as $st)
	{
		$obj_pdf->MultiCell(0, 15, 'Nomor: '. str_replace("-", "/", $st['Nomor_Surat_Tugas']), 0, 'C', false, 1, 15, 65, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Berdasarkan '. $st['Dasar_Surat'] .' Tanggal '. date('d', strtotime($st['Tanggal_Surat_Tugas'])).' '. date('F', strtotime($st['Tanggal_Surat_Tugas'])).' '.date('Y', strtotime($st['Tanggal_Surat_Tugas'])) .'. Dengan ini Ketua Komisi Pemilihan Umum Tangerang, dengan ini memerintahkan/menugaskan kepada: ', 0, 'L', false, 1, 15, 85, true, 0, false, true, 0, 'T', false);
		
	}
	
	$i=1;
	foreach($pegawai_bertugas as $peg)
	{
		$obj_pdf->MultiCell(0, 15, $i.'. ', 0, 'L', false, 1, 12, ($i-1)*15+100, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Nama', 0, 'L', false, 1, 15, ($i-1)*15+100, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$peg['Nama_Lengkap'], 0, 'L', false, 1, 45, ($i-1)*15+100, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'NIP', 0, 'L', false, 1, 15, ($i-1)*15+105, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$peg['NIP'], 0, 'L', false, 1, 45, ($i-1)*15+105, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Jabatan', 0, 'L', false, 1, 15, ($i-1)*15+110, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$peg['Jabatan'], 0, 'L', false, 1, 45, ($i-1)*15+110, true, 0, false, true, 0, 'T', false);
		$i++;
	}
	
	foreach($detail_st as $st)
	{
		$obj_pdf->MultiCell(0, 15, 'Maksud/Tujuan', 0, 'L', false, 1, 15, ($i-2)*15+120, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$st['Maksud_Perjalanan_Dinas'], 0, 'L', false, 1, 45, ($i-2)*15+120, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Tempat Tujuan', 0, 'L', false, 1, 15, ($i-2)*15+125, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$st['Tujuan_Perjalanan_Dinas'], 0, 'L', false, 1, 45, ($i-2)*15+125, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Alat Angkutan', 0, 'L', false, 1, 15, ($i-2)*15+130, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$st['Angkutan'], 0, 'L', false, 1, 45, ($i-2)*15+130, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Lama Dinas', 0, 'L', false, 1, 15, ($i-2)*15+135, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.date_diff(date_create($st['Tanggal_Berangkat']), date_create($st['Tanggal_Kembali']))->format('%d').' hari', 0, 'L', false, 1, 45, ($i-2)*15+135, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Tanggal Berangkat', 0, 'L', false, 1, 15, ($i-2)*15+140, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.date('d', strtotime($st['Tanggal_Berangkat'])).' '. date('F', strtotime($st['Tanggal_Berangkat'])).' '.date('Y', strtotime($st['Tanggal_Berangkat'])), 0, 'L', false, 1, 45, ($i-2)*15+140, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Tanggal Kembali', 0, 'L', false, 1, 15, ($i-2)*15+145, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.date('d', strtotime($st['Tanggal_Kembali'])).' '.date('F', strtotime($st['Tanggal_Kembali'])).' '.date('Y', strtotime($st['Tanggal_Kembali'])), 0, 'L', false, 1, 45, ($i-2)*15+145, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Demikianlah Surat Perintah Tugas ini dibuat untuk dilaksanakan dengan sebagaimana mestinya', 0, 'L', false, 1, 15, ($i-2)*15+155, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Tangerang,     '. date('F', strtotime($st['Tanggal_Surat_Tugas'])).' '. date('Y', strtotime($st['Tanggal_Surat_Tugas'])), 0, 'R', false, 1, 15, ($i-2)*15+175, true, 0, false, true, 0, 'T', false);
		
	}
	
	foreach($pejabat_berwenang as $acc)
	{
		$obj_pdf->MultiCell(0, 15, 'Ketua, ', 0, 'L', false, 1, 165, ($i-2)*15+180, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, $acc['Nama_Lengkap'], 0, 'L', false, 1, 155, ($i-2)*15+200, true, 0, false, true, 0, 'T', false);
	}
	
	//END OF CONTENT
    $content = ob_get_contents();

$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_clean();
ob_flush();
ob_end_flush();
ob_end_clean();
$obj_pdf->Output('SuratTugas.pdf', 'I');

exit;