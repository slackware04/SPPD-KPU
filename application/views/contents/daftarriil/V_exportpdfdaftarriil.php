<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
pdfInit();

class MYPDF extends TCPDF 
{
    //Page header
    public function Header() 
	{
		$this->SetFont('helvetica', '', 10);
		$this->MultiCell(0, 15, 'LAMPIRAN IX', 0, 'L', false, 1, 75, 10, true, 0, false, true, 0, 'T', false);
		$this->MultiCell(0, 15, 'PERATURAN MENTERI KEUANGAN REPUBLIK INDONESIA', 0, 'L', false, 1, 75, 15, true, 0, false, true, 0, 'T', false);
		$this->MultiCell(0, 15, 'NOMOR 113/PMK.05/2012', 0, 'L', false, 1, 75, 20, true, 0, false, true, 0, 'T', false);
		$this->MultiCell(0, 15, 'TENTANG', 0, 'L', false, 1, 75, 25, true, 0, false, true, 0, 'T', false);
		$this->MultiCell(0, 15, 'PERJALANAN DINAS JABATAN DALAM NEGERI BAGI PEJABAT NEGARA, PEGAWAI NEGERI, DAN PEGAWAI TIDAK TETAP', 0, 'L', false, 1, 75, 30, true, 0, false, true, 0, 'T', false);
		
		$this->SetFont('helvetica', 'B', 10);
		$this->MultiCell(0, 15, 'DAFTAR PENGELUARAN RIIL', 0, 'C', false, 1, 0, 50, true, 0, false, true, 0, 'T', false);
    }
	
	public function createTable($header, $data)
	{
		$this->SetFillColor(255, 255, 255);
		$this->SetTextColor(0);
		$this->SetDrawColor(0, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		
		$w = array(25, 65, 45);
		$y = array(0, 0, 25);
		$z = array(0, 25, 65);
		
		$num_headers = count($header);
		$awal = 35;
		for($i = 0; $i < $num_headers; ++$i)
		{
			$this->MultiCell($w[$i], 7, $header[$i], 1, 'L', false, 0, $awal + $y[$i] + $z[$i], 125, true, 0, false, true, 0, 'M', false);
			
		}
		$this->Ln();
		
		$this->SetFillColor(255, 255, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		
		$fill = 0;
		$i = 1;
		foreach($data as $row)
		{
			//$row_height = 10 + (10 * 3);
			
			$this->MultiCell($w[0], 7, $row[0], 1, 'L', false, 0, $awal + $y[0] + $z[0], 125 + $i*7, true, 0, false, true, 0, 'M', false);
			$this->MultiCell($w[1], 7, $row[1], 1, 'L', false, 0, $awal + $y[1] + $z[1], 125 + $i*7, true, 0, false, true, 0, 'M', false);
			$this->MultiCell($w[2], 7, 'Rp. '.number_format($row[2]), 1, 'L', false, 0, $awal + $y[2] + $z[2], 125 + $i*7, true, 0, false, true, 0, 'M', false);
			$i++;
			//$this->Ln();
		}
		$this->Ln();
		//$this->Cell(array_sum($w), 0, '', 'T');
		
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
	foreach($detail_dpr as $dpr)
	{
		$obj_pdf->MultiCell(0, 15, 'Yang bertanda tangan di bawah ini:', 0, 'L', false, 1, 15, 70, true, 0, false, true, 0, 'T', false);
		
		//data person
		$obj_pdf->MultiCell(0, 15, 'Nama', 0, 'L', false, 1, 15, 80, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '. $dpr['Nama_Lengkap'], 0, 'L', false, 1, 35, 80, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'NIP', 0, 'L', false, 1, 15, 85, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '. $dpr['NIP'], 0, 'L', false, 1, 35, 85, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Jabatan', 0, 'L', false, 1, 15, 90, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, ': '. $dpr['Jabatan'], 0, 'L', false, 1, 35, 90, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, 'Berdasarkan Surat Perjalanan Dinas (SPD) Nomor :'. $dpr['Nomor_Surat_SPD'] .', Tanggal '. $dpr['Tanggal_Laporan'].', dengan ini kami menyatakan sesungguhnya bahwa: ', 0, 'L', false, 1, 15, 100, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 15, '1. ', 0, 'L', false, 1, 25, 110, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Biaya Transport pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh bukti pengeluarannya meliputi: ', 0, 'L', false, 1, 35, 110, true, 0, false, true, 0, 'T', false);
		
	}
	
	//table
	$header = array('Nomor', 'Uraian', 'Jumlah');
	$data = array();
	
	$i = 1;
	foreach($list_biaya as $row)
	{
		$values = array();
		
		array_push($values, $i);
		array_push($values, $row['Uraian_Biaya']);
		
		array_push($values, $row['Jumlah_Biaya']);

		array_push($data, $values);
		$i++;
	}
	
	$obj_pdf->createTable($header, $data);
	
	$obj_pdf->MultiCell(0, 15, '2. ', 0, 'L', false, 1, 25, 110 + ($i+1)*10, true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(0, 15, 'Jumlah uang pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetor kelebihan tersebut ke Kas Negara', 0, 'L', false, 1, 35, 110 + ($i+1)*10, true, 0, false, true, 0, 'T', false);
	
	$obj_pdf->MultiCell(0, 15, 'Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.', 0, 'L', false, 1, 35, 120 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	
	foreach($detail_dpr as $dpr)
	{
		$obj_pdf->MultiCell(0, 15, 'Mengetahui/menyetujui', 0, 'L', false, 1, 35, 130 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 15, 'Tangerang,      '. date('F', strtotime($dpr['Tanggal_Laporan'])).' '. date('Y', strtotime($dpr['Tanggal_Laporan'])), 0, 'R', false, 1, 35, 130 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	}
	
	$obj_pdf->MultiCell(0, 15, 'Pejabat Pembuat Komitmen', 0, 'L', false, 1, 35, 135 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(0, 15, 'Pelaksana SPD', 0, 'R', false, 1, 35, 135 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	
	$obj_pdf->SetFont('helvetica', 'B', 10);
	$obj_pdf->MultiCell(0, 15, 'BINSAR LEONARDUS S, S.Kom', 0, 'L', false, 1, 35, 160 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	$obj_pdf->SetFont('helvetica', '', 10);
	$obj_pdf->MultiCell(0, 15, 'NIP: 197808302006041007', 0, 'L', false, 1, 35, 165 + ($i+2)*10, true, 0, false, true, 0, 'T', false);
	
	
	//END OF CONTENT
    $content = ob_get_contents();
//ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_clean();
ob_flush();
ob_end_flush();
ob_end_clean();
$obj_pdf->Output('DaftarPengeluaranRiil.pdf', 'I');

exit;