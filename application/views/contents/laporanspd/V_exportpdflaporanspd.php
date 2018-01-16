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
		$this->Cell(0, 15, 'Laporan Perjalanan Dinas', 0, 1, 'C', false, '', 0, false, 'M', 'M');
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
	foreach($laporan as $lap)
	{
		$obj_pdf->MultiCell(0, 15, 'Tahun Anggaran: 2017', 0, 'C', false, 1, 15, 65, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, '1. Dasar Pelaksanaan', 0, 'L', false, 1, 15, 75, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': ' . $lap['Nomor_Surat_SPD'], 0, 'L', false, 1, 75, 75, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, '2. Maksud Perjalanan Dinas', 0, 'L', false, 1, 15, 85, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': ' . $lap['Maksud_Perjalanan_Dinas'], 0, 'L', false, 1, 75, 85, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, '3. Dinas/Instansi yang Dikunjungi', 0, 'L', false, 1, 15, 95, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': ' . $lap['Instansi_yang_Dikunjungi'], 0, 'L', false, 1, 75, 95, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, '4. Hasil', 0, 'L', false, 1, 15, 105, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': ' . $lap['Hasil'], 0, 'L', false, 1, 75, 105, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Tangerang,     '. date('F', strtotime($lap['Tanggal_Laporan'])).' '. date('Y', strtotime($lap['Tanggal_Laporan'])), 0, 'R', false, 1, 15, 125, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Yang Membuat, ', 0, 'R', false, 1, 40, 130, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, $lap['Nama_Lengkap'], 0, 'R', false, 1, 40, 150, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'NIP: '.$lap['NIP'], 0, 'R', false, 1, 40, 155, true, 0, false, true, 0, 'T', false);
	}
	
	
	
	//END OF CONTENT
    $content = ob_get_contents();
//ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_clean();
ob_flush();
ob_end_flush();
ob_end_clean();
$obj_pdf->Output('LaporanSPD.pdf', 'I');

exit;