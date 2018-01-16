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
		$this->Cell(0, 15, 'SURAT PERJALANAN DINAS', 0, 1, 'C', false, '', 0, false, 'M', 'M');
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
	foreach($detail_spd as $spd)
	{
		$obj_pdf->MultiCell(0, 10, 'Nomor :'. str_replace("-", "/", $spd['Nomor_Surat_SPD']), 0, 'C', false, 1, 15, 65, true, 0, false, true, 0, 'T', false);
		
		//1
		$obj_pdf->MultiCell(25, 10, '1. ', 1, 'L', false, 0, 25, 80, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'Pejabat Pembuat Komitmen', 1, 'L', false, 0, 25 + 25, 80, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, 'BINSAR LEONARDUS S, S.Kom/197808302006041007', 1, 'L', false, 0, 25 + 25 + 75, 80, true, 0, false, true, 0, 'T', false);
		
		//2
		$obj_pdf->MultiCell(25, 10, '2. ', 1, 'L', false, 0, 25, 90, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'Nama/NIP Pegawai yang Melaksanakan Perjalanan Dinas', 1, 'L', false, 0, 25 + 25, 90, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, $spd['Nama_Lengkap'].' / '.$spd['Nama_Pelaksana_SPD'], 1, 'L', false, 0, 25 + 25 + 75, 90, true, 0, false, true, 0, 'T', false);
		
		//3
		$obj_pdf->MultiCell(25, 10, '3. '."\n \n".' ', 1, 'L', false, 0, 25, 100, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'a. Jabatan'. "\n \n" .'b. Tingkat menurut Perjalanan Dinas', 1, 'L', false, 0, 25 + 25, 100, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, $spd['Jabatan']." \n \n".$spd['Tingkat_Peraturan_Perjalanan_Dinas'], 1, 'L', false, 0, 25 + 25 + 75, 100, true, 0, false, true, 0, 'T', false);
		
		//4
		$obj_pdf->MultiCell(25, 10, '4. ', 1, 'L', false, 0, 25, 112, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'Maksud Perjalanan Dinas', 1, 'L', false, 0, 25 + 25, 112, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, $spd['Maksud_Perjalanan_Dinas'], 1, 'L', false, 0, 25 + 25 + 75, 112, true, 0, false, true, 0, 'T', false);
		
		//5
		$obj_pdf->MultiCell(25, 10, '5. ', 1, 'L', false, 0, 25, 122, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'Alat Angkutan yang Dipergunakan', 1, 'L', false, 0, 25 + 25, 122, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, $spd['Angkutan'], 1, 'L', false, 0, 25 + 25 + 75, 122, true, 0, false, true, 0, 'T', false);
		
		//6
		$obj_pdf->MultiCell(25, 10, '6. '."\n \n".' ', 1, 'L', false, 0, 25, 132, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'a. Tempat berangkat'. "\n \n" .'b. Tempat tujuan', 1, 'L', false, 0, 25 + 25, 132, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, 'Tangerang'. "\n \n" .$spd['Tujuan_Perjalanan_Dinas'], 1, 'L', false, 0, 25 + 25 + 75, 132, true, 0, false, true, 0, 'T', false);
		
		//7
		$obj_pdf->MultiCell(25, 10, '7. '."\n \n".' '."\n \n".' ', 1, 'L', false, 0, 25, 144, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'a. Lamanya Perjalanan Dinas'. "\n \n" .'b. Tanggal berangkat'. "\n \n" .'c. Tanggal harus kembali', 1, 'L', false, 0, 25 + 25, 144, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, 'Tangerang'. "\n \n" .$spd['Tanggal_Berangkat']. "\n \n" .$spd['Tanggal_Kembali'], 1, 'L', false, 0, 25 + 25 + 75, 144, true, 0, false, true, 0, 'T', false);
		
		//8
		$obj_pdf->MultiCell(25, 10, '8. ', 1, 'L', false, 0, 25, 164, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75+55, 10, 'Pengikut', 1, 'L', false, 0, 25 + 25, 164, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(75, 10, 'Nama ', 1, 'L', false, 0, 25, 174, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(80, 10, 'Keterangan', 1, 'L', false, 0, 25 + 75, 174, true, 0, false, true, 0, 'T', false);
	}
	$nama = '';
	$ket = '';
	$num = 1;
	foreach($list_keluarga as $kel)
	{
		$nama = $nama.$num.'. '.$kel['Nama_Pengikut']."\n";
		$ket = $ket.$kel['Keterangan']."\n";
		$num++;
	}
	if($num <= 3)
	{
		$space = 0;
	}
	else
	{
		$space = 1;
	}
	foreach($detail_spd as $spd)
	{
		$obj_pdf->MultiCell(75, 10, $nama, 1, 'L', false, 0, 25, 184, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(80, 10, $ket, 1, 'L', false, 0, 25 + 75, 184, true, 0, false, true, 0, 'T', false);
		
		
		//9
		$obj_pdf->MultiCell(25, 10, '9. '."\n \n".' '."\n \n".' ', 1, 'L', false, 0, 25, 194+($space*$num), true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 10, 'Pembebanan Anggaran'."\n \n".'a. Instansi'."\n \n".'b. Akun', 1, 'L', false, 0, 25 + 25, 194+($space*$num), true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 10, ' '."\n \n".'Kabupaten Tangerang'."\n \n".$spd['Akun'], 1, 'L', false, 0, 25 + 25 + 75, 194+($space*$num), true, 0, false, true, 0, 'T', false);
		
		//10
		$obj_pdf->MultiCell(25, 7, '10. ', 1, 'L', false, 0, 25, 214+($space*$num), true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(75, 7, 'Keterangan lain-lain', 1, 'L', false, 0, 25 + 25, 214+($space*$num), true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(55, 7, $spd['Keterangan_Lain'], 1, 'L', false, 0, 25 + 25 + 75, 214+($space*$num), true, 0, false, true, 0, 'T', false);
		
		//ending n ttd
		$obj_pdf->MultiCell(0, 10, 'Dikeluarkan di', 0, 'L', false, 0, 125, 225, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 10, ': Tangerang', 0, 'L', false, 0, 125+25, 225, true, 0, false, true, 0, 'T', false);
		
		$obj_pdf->MultiCell(0, 10, 'Tanggal', 0, 'L', false, 0, 125, 230, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(0, 10, ': '.$spd['Tanggal_Surat_SPD'], 0, 'L', false, 0, 125+25, 230, true, 0, false, true, 0, 'T', false);
		
	}
	$obj_pdf->MultiCell(0, 15, 'PEJABAT PEMBUAT KOMITMEN', 0, 'C', false, 1, 130, 238, true, 0, false, true, 0, 'T', false);
	$obj_pdf->SetFont('helvetica', 'B', 9);
	$obj_pdf->MultiCell(0, 15, 'Binsar Leonardus, S.Kom', 0, 'C', false, 1, 130, 252, true, 0, false, true, 0, 'T', false);
	$obj_pdf->SetFont('helvetica', '', 9);
	$obj_pdf->MultiCell(0, 15, 'NIP: 197808302006041007', 0, 'C', false, 1, 130, 257, true, 0, false, true, 0, 'T', false);
	
	
$obj_pdf->AddPage($orientation = 'P');
	
	$obj_pdf->SetFont('helvetica', '', 8);
	$obj_pdf->MultiCell(75, 30, ' ', 1, 'L', false, 0, 25, 70, true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(80, 30, '1. Berangkat dari            : KPU Kabupaten Tangerang'."\n".'   (Tempat kedudukan)'."\n".'    Ke'."\n".'    Pada tanggal'."\n".'                                   Plt Sekretaris,'."\n\n\n".'                             (Willy Patria, SE, M.Si)', 1, 'L', false, 0, 25 + 75, 70, true, 0, false, true, 0, 'T', false);
	$xyz=1;
	for($i=1; $i<=4; $i++)
	{
		$obj_pdf->MultiCell(75, 30, $i + 1 .'. Tiba di'."\n".'    Pada Tanggal'."\n".'    Jabatan'."\n\n\n\n\n".'                        (......................................)', 1, 'L', false, 0, 25, 70+30*$i, true, 0, false, true, 0, 'T', false);
		$obj_pdf->MultiCell(80, 30, ' Berangkat dari'."\n".' (Tempat kedudukan)'."\n".'  Ke'."\n".'  Pada tanggal'."\n".','."\n\n\n".'                             (......................................)', 1, 'L', false, 0, 25 + 75, 70+30*$i, true, 0, false, true, 0, 'T', false);
		$xyz=$i;
	}	
	$obj_pdf->MultiCell(75, 30, '6. Tiba di'."\n".'    Pada Tanggal'."\n".'    Jabatan'."\n".'                      Pejabat Pembuat Komitmen'."\n\n\n\n".'                        (Binsar Leonardus, S.Kom)', 1, 'L', false, 0, 25, 70+30*($xyz+1), true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(80, 30, 'Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untk kepentingan jabatan dalam waktu yang sesingkat-singkatnya'."\n".'                          Pejabat Pembuat Komitmen'."\n\n\n\n".'                            (Binsar Leonardus, S.Kom)', 1, 'L', false, 0, 25 + 75, 70+30*($xyz+1), true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(75+80, 5, '7. Catatan Lain-lain', 1, 'L', false, 0, 25, 70+30*($xyz+2), true, 0, false, true, 0, 'T', false);
	$obj_pdf->MultiCell(75+80, 17, '8. Perhatian'."\n".'   PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita kerugian akibat kesalahan, kelalaian, serta kealpaannya', 1, 'L', false, 0, 25, 70+30*($xyz+2)+5, true, 0, false, true, 0, 'T', false);
	//END OF CONTENT
    $content = ob_get_contents();



$obj_pdf->writeHTML($content, true, false, true, false, '');
ob_clean();
ob_flush();
ob_end_flush();
ob_end_clean();
$obj_pdf->Output('Kwitansi.pdf', 'I');

exit;