<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-user glyph-menu"></span>
		Pejabat
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Pejabat</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('Pejabat/insert'); ?>" method="post">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nama Jabatan: </strong></span>
							<select name="param1" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Nama Jabatan</option>
								<option value="KKPUX-001">
									Ketua Komisi Pemilihan Umum Kabupaten Kota
								</option>
								<option value="WKKPU-002">
									Wakil Ketua Komisi Pemilihan Umum Kabupaten/Kota
								</option>
								<option value="SKKPU-003">
									Sekretaris Komisi Pemilihan Umum Daerah Kabupaten/Kota
								</option>
								<option value="KPAXX-004">
									Kuasa Pengguna Anggaran
								</option>
								<option value="PPKXX-005">
									Pejabat Pembuat Komitmen
								</option>
								<option value="BPXXX-006">
									Bendahara Pengeluaran
								</option>
								<option value="KSBPD-007">
									Kasubag Program dan Data
								</option>
								<option value="KSBTH-008">
									Kasubag Teknis dan Hubmas
								</option>
								<option value="KSBHK-009">
									Kasubag Hukum
								</option>
								<option value="KSBKH-010">
									Kasubag Keuangan Hukum Logistik
								</option>
								<option value="AGKPU-011">
									Anggota KPU 1
								</option>
								<option value="AGKPU-012">
									Anggota KPU 2
								</option>
								<option value="AGKPU-013">
									Anggota KPU 3
								</option>
								<option value="AGKPU-014">
									Anggota KPU 4
								</option>
								
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>NIP & Nama: </strong></span>
							<select name="param2" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Golongan/Pangkat Pegawai</option>
								<?php
									foreach($data_pegawai as $row)
									{
										echo '<option value="' . $row['NIP'] . '">';
										echo $row['NIP'] . ' - ' . $row['Nama_Lengkap'];
										echo '</option>';
									}
								?>
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="col-md-4">
							<button type="reset" class="btn btn-success btn-block btn-flat btn-login" value="login" name="login">Reset</button>
						</div>
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat btn-login" value="login" name="login">Submit</button>
						</div>
					</div>
					<div class="col-md-2"></div>
				</form>
			</div>
		</div>
	</div>
</div>