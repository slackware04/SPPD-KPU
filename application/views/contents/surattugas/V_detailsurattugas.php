<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-plane glyph-menu"></span>
		Detail Surat Tugas
	</div>
	<br/>
	<div class="col-md-4">
		<ul class="list-group">
			<li href="" class="list-group-item">
				<strong><center>Informasi Umum</center></strong>
			</li>
			<?php
				foreach($detail_st as $surat)
				{
					echo '<li class="list-group-item">
						<strong>No Surat : </strong>
						<div class="right">';
					echo $surat['Nomor_Surat_Tugas'];
					echo '</div>
						</li>';
					
					echo '<li href="" class="list-group-item">
						<strong>Tanggal Surat :</strong>
						<div class="right">';
					echo $surat['Tanggal_Surat_Tugas'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Maksud Perjalanan Dinas :</strong>
						<div class="right">';
					echo $surat['Maksud_Perjalanan_Dinas'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Angkutan :</strong>
						<div class="right">';
					echo $surat['Angkutan'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Tujuan Perjalanan Dinas :</strong>
						<div class="right">';
					echo $surat['Tujuan_Perjalanan_Dinas'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Tanggal Berangkat :</strong>
						<div class="right">';
					echo $surat['Tanggal_Berangkat'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Tanggal Kembali :</strong>
						<div class="right">';
					echo $surat['Tanggal_Kembali'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Lama Perjalanan Dinas :</strong>
						<div class="right">';
					echo '4 Hari';	
					echo '</div>
						</li>';
				}
			?>
		</ul>
	</div>
	
	<div class="col-md-4">
		<ul class="list-group">
			<li href="" class="list-group-item">
				<strong><center>Pegawai yang Ditugaskan</center></strong>
			</li>
			<?php
				foreach($pegawai_bertugas as $pegawai)
				{
					echo '<li class="list-group-item">';
					echo '<strong>Nama :</strong><div class="right">';
					echo $pegawai['Nama_Lengkap'];
					echo '</div><br/><strong>NPM :</strong><div class="right">';
					echo $pegawai['NIP'];
					echo '</div>';
					echo '</li>';
				}
			?>
			
		</ul>
	</div>
	
	<div class="col-md-4">
		<li class="list-group-item">
			<strong><center>Disetujui Oleh</center></strong>
		</li>
		<?php
			foreach($pejabat_berwenang as $pejabat)
			{
				echo '<li class="list-group-item">
					<strong>Nama :</strong>
					<div class="right">';
				echo $pejabat['Nama_Lengkap'];
				echo '</div>
					<br/>
					<strong>NPM :</strong>
					<div class="right">';
				echo $pejabat['NIP'];
				echo '</div>
					<br/>
					<strong>Jabatan :</strong>
					<br/>';
				echo $pejabat['Nama_Jabatan'];
				echo '</li>';
			}
		?>
		<br/>
		
		<center>
		<a href="
			<?php 
				foreach($detail_st as $surat)
				{
					$id = $surat['Nomor_Surat_Tugas'];
				}
				echo base_url('SuratTugas/exportPDF/' . str_replace("/", "-", $id)); 
				
			?>">
			<button class="btn btn-primary">Cetak PDF</button></center>
		</a>
	</div>
</div>