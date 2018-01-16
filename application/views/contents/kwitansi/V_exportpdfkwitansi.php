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
		$this->Cell(0, 15, 'KWITANSI', 0, 1, 'C', false, '', 0, false, 'M', 'M');
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
	foreach($detail_kw as $kw)
	{
		$obj_pdf->MultiCell(0, 15, 'Tahun Anggaran: 2017', 0, 'R', false, 1, 15, 70, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Nomor Bukti: '. str_replace("-", "/", $kw['Nomor_Surat_SPD']), 0, 'R', false, 1, 15, 75, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Kode Akun: '.$kw['Akun'], 0, 'R', false, 1, 15, 80, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->SetFont('helvetica', 'B', 12);
		$obj_pdf->MultiCell(0, 15, 'Kwitansi/Bukti Pembayaran', 0, 'C', false, 1, 15, 85, true, 0, false, true, 0, 'T', false);
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->MultiCell(0, 15, 'Sudah Terima dari', 0, 'L', false, 1, 15, 95, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$kw['Nama_Jabatan'], 0, 'L', false, 1, 55, 95, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Jumlah Uang', 0, 'L', false, 1, 15, 100, true, 0, false, true, 0, 'T', false);
		$total_biaya = ($kw['Harga_Satuan_1']*$kw['Satuan_1'])+($kw['Harga_Satuan_2']*$kw['Satuan_2'])+($kw['Harga_Satuan_3']*$kw['Satuan_3'])+($kw['Harga_Satuan_4']*$kw['Satuan_4'])+($kw['Harga_Satuan_5']*$kw['Satuan_5'])+($kw['Harga_Satuan_6']*$kw['Satuan_6'])+($kw['Harga_Satuan_7']*$kw['Satuan_7'])+($kw['Harga_Satuan_8']*$kw['Satuan_8']);
		$obj_pdf->MultiCell(0, 15, ': Rp. '. number_format($total_biaya), 0, 'L', false, 1, 55, 100, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Untuk Pembayaran', 0, 'L', false, 1, 15, 105, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '.$kw['Nama_Kegiatan'], 0, 'L', false, 1, 55, 105, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Tangerang,     '. date('F', strtotime($kw['Tanggal_Kwitansi'])).' '. date('Y', strtotime($kw['Tanggal_Kwitansi'])), 0, 'R', false, 1, 15, 125, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Penerima, ', 0, 'R', false, 1, 40, 130, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, '(....................................)', 0, 'R', false, 1, 40, 150, true, 0, false, true, 0, 'T', false);
		
		
		
		$obj_pdf->MultiCell(0, 15, 'Setuju dibebankan pada mata anggaran berkenaan', 0, 'L', false, 1, 15, 160, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Mengetahui,', 0, 'L', false, 1, 15, 165, true, 0, false, true, 0, 'T', false);
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->MultiCell(0, 15, 'Kuasa Pengguna Anggaran', 0, 'L', false, 1, 15, 170, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Pejabat Pembuat Komitmen', 0, 'C', false, 1, 15, 170, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Bendahara Pengeluaran', 0, 'R', false, 1, 15, 170, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->SetFont('helvetica', 'B', 9);
		$obj_pdf->MultiCell(0, 15, 'Willy Patria, SE, M.Si', 0, 'L', false, 1, 15, 190, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Binsar Leonardus, S.Kom', 0, 'C', false, 1, 15, 190, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Rahardian, S.Sos, M.Si', 0, 'R', false, 1, 15, 190, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->MultiCell(0, 15, 'NIP: 197610272005011007', 0, 'L', false, 1, 15, 195, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'NIP: 197808302006041007', 0, 'C', false, 1, 15, 195, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'NIP: 198005082009021006', 0, 'R', false, 1, 15, 195, true, 0, false, true, 0, 'T', false);
	}
	
	
	
	//END OF CONTENT
    $content = ob_get_contents();
//ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_clean();
ob_flush();
ob_end_flush();
ob_end_clean();
$obj_pdf->Output('Kwitansi.pdf', 'I');

exit;