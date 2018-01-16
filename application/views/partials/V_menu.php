<div class="col-md-2 menu-bar">
				
	<div class="vertical-menu">
		<!-- Homepage -->
		<a href="<?php echo base_url('Home'); ?>" class="active">
			<span class="glyphicon glyphicon-home glyph-menu"></span>
			Dashboard
		</a>
		
		<!-- Data Umum -->
		<a href="#" id="menu3" data-toggle="collapse" data-target="#submenu3">
			<span class="glyphicon glyphicon-list-alt glyph-menu"></span>
			Data Umum
			<b class="caret"></b>
		</a>
		<div id="submenu3" class="collapse">
			<a href="<?php echo base_url('Entitas'); ?>">
				<span class="glyphicon glyphicon-home glyph-submenu"></span>
				Data Entitas
			</a>
			<a href="<?php echo base_url('Pegawai'); ?>">
				<span class="glyphicon glyphicon-user glyph-submenu"></span>
				Data Pegawai
			</a>
			<a href="<?php echo base_url('Pejabat'); ?>">
				<span class="glyphicon glyphicon-th-list glyph-submenu"></span>
				Data Pejabat
			</a>
			<a href="<?php echo base_url('Anggaran'); ?>">
				<span class="glyphicon glyphicon-usd glyph-submenu"></span>
				Data Anggaran
			</a>
		</div>
		
		<!-- Penugasan -->
		<a href="#" id="menu2" data-toggle="collapse" data-target="#submenu2">
			<span class="glyphicon glyphicon-tasks glyph-menu"></span>
			Penugasan
			<b class="caret"></b>
		</a>
		<div id="submenu2" class="collapse">
			<a href="<?php echo base_url('SuratTugas'); ?>">
				<span class="glyphicon glyphicon-send glyph-submenu"></span>
				Surat Tugas
			</a>
			<a href="<?php echo base_url('SuratPerjalananDinas'); ?>">
				<span class="glyphicon glyphicon-send glyph-submenu"></span>
				SPD
			</a>
			<a href="<?php echo base_url('RincianBiaya'); ?>">
				<span class="glyphicon glyphicon-usd glyph-submenu"></span>
				Rincian Biaya
			</a>
			<a href="<?php echo base_url('Kwitansi'); ?>">
				<span class="glyphicon glyphicon-tags glyph-submenu"></span>
				Kwitansi
			</a>
			
		</div>
		
		<!-- Persetujuan -->
		<?php
			if($this->session->userdata('role') == 'pegawai')
			{
				echo '<a style="color:red;"><span class="glyphicon glyphicon-ok glyph-menu"></span>
					Persetujuan</a>';
			}
			else
			{
				echo '<a href="' . base_url('Persetujuan') .'">
			<span class="glyphicon glyphicon-ok glyph-menu"></span>
			Persetujuan
			
		</a>';
			}
		?>
		
		
		<!-- Saldo -->
		<a href="<?php echo base_url('Anggaran/realisasi'); ?>">
			<span class="glyphicon glyphicon-usd glyph-menu"></span>
			Realisasi Anggaran
		</a>
		
		<!-- Pelaporan -->
		<a href="#" id="menu5" data-toggle="collapse" data-target="#submenu5">
			<span class="glyphicon glyphicon-pencil glyph-menu"></span>
			Pelaporan
			<b class="caret"></b>
		</a>
		<div id="submenu5" class="collapse">
			<a href="<?php echo base_url('DaftarRiil'); ?>">
				<span class="glyphicon glyphicon-usd glyph-submenu"></span>
				Daft. Pengel. Riil
			</a>
			<a href="<?php echo base_url('LaporanSPD'); ?>">
				<span class="glyphicon glyphicon-pencil glyph-submenu"></span>
				Laporan SPD
			</a>
		</div>
		
		<!-- Setting -->
		<a href="#" id="menu4" data-toggle="collapse" data-target="#submenu4">
			<span class="glyphicon glyphicon-cog glyph-menu"></span>
			Setting
			<b class="caret"></b>
		</a>
		<div id="submenu4" class="collapse">
			<a href="#">
				<span class="glyphicon glyphicon-lock glyph-submenu"></span>
				Ganti Password
			</a>
		</div>
		
		
	
	</div>		
	
</div>