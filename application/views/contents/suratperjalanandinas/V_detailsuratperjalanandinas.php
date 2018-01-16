<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-plane glyph-menu"></span>
		Detail Surat Perjalanan Dinas
	</div>
	<br/>
	<div class="col-md-4">
		<ul class="list-group">
			<li href="" class="list-group-item">
				<strong><center>Informasi Umum</center></strong>
			</li>
			<?php
				foreach($detail_spd as $surat)
				{
					echo '<li class="list-group-item">
						<strong>No Surat : </strong>
						<div class="right">';
					echo $surat['Nomor_Surat_SPD'];
					echo '</div>
						</li>';
					
					echo '<li href="" class="list-group-item">
						<strong>Tanggal Surat :</strong>
						<div class="right">';
					echo $surat['Tanggal_Surat_SPD'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Nomor Surat Tugas :</strong>
						<div class="right">';
					echo $surat['Nomor_Surat_Tugas'];	
					echo '</div>
						</li>';
					
					echo '<li href="" class="list-group-item">
						<strong>Nama Pelaksana :</strong>
						<div class="right">';
					echo $surat['Nama_Pelaksana_SPD'];	
					echo '</div>
						</li>';
					
					echo '<li href="" class="list-group-item">
						<strong>Mata Anggaran :</strong>
						<div class="right">';
					echo $surat['Akun'];	
					echo '</div>
						</li>';
						
					echo '<li href="" class="list-group-item">
						<strong>Keterangan :</strong>
						<div class="right">';
					echo $surat['Keterangan_Lain'];
					echo '</div>
						</li>';
				}
			?>
		</ul>
	</div>
	
	<div class="col-md-4">
		<ul class="list-group">
			<li href="" class="list-group-item">
				<strong><center>Pengikut</center></strong>
			</li>
			<?php
				foreach($keluarga as $kel)
				{
					echo '<li class="list-group-item">';
					echo '<strong>Nama :</strong><div class="right">';
					echo $kel['Nama_Pengikut'];
					echo '</div><br/><strong>NPM :</strong><div class="right">';
					echo $kel['Keterangan'];
					echo '</div>';
					echo '</li>';
				}
			?>
			
		</ul>
		<center>
			<a href="
				<?php 
					foreach($detail_spd as $surat)
					{
						$id = $surat['Nomor_Surat_SPD'];
					}
					echo base_url('SuratPerjalananDinas/exportPDF/' . str_replace("/", "-", $id)); 
					
				?>">
				<button class="btn btn-primary">Cetak PDF</button>
			</a>
		</center>
	</div>
	
	<div class="col-md-4">
		<li class="list-group-item">
			<strong><center>Disetujui Oleh</center></strong>
		</li>
		<!--<div class="vertical-menu">-->
		<?php
			foreach($pejabat_berwenang as $pejabat)
			{
				echo '
				<a href="#" class="list-group-item" id="menu'.$pejabat['NIP'].'" data-toggle="collapse" data-target="#submenu'.$pejabat['NIP'].'">
					<span class="glyphicon glyphicon-ok glyph-menu"></span>
					'.$pejabat['Kewenangan'].'
					<b class="caret"></b>
				</a>
				<div id="submenu'.$pejabat['NIP'].'" class="collapse">
					<a href="#" class="list-group-item">
						<span class="glyphicon glyphicon-tag glyph-submenu"></span>
						NIP: '. $pejabat['NIP'] .'
					<br/><br/>
						<span class="glyphicon glyphicon-user glyph-submenu"></span>
						Nama: '. $pejabat['Nama_Lengkap'] .'
					<br/><br/>
						<span class="glyphicon glyphicon-lock glyph-submenu"></span>
						Jabatan: '. $pejabat['Nama_Jabatan'] .'
					</a>
				</div>';
				
			}
		?>
		<br/>
		<!--</div>-->
		
	</div>
</div>