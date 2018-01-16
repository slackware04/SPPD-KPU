<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-plane glyph-menu"></span>
		Surat Perjalanan Dinas
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Surat Perjalanan Dinas</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('SuratPerjalananDinas/insert'); ?>" method="post">
					
					<div class="col-md-2"></div>
					<div class="col-md-8">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#umum">Data Umum Surat</a></li>
						<li><a data-toggle="tab" href="#acc">Data ACC Pejabat</a></li>
						<li><a data-toggle="tab" href="#pegawai">Data Pegawai & Keterangan</a></li>
					</ul>
					
						<div class="tab-content">
							<div id="umum" class="tab-pane fade in active">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Nomor Surat Tugas: </strong></span>
									<select name="param1" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Nomor Surat Tugas
										</option>
										<?php
											foreach($daftar_surat as $rows)
											{
												echo '<option value="'. $rows['Nomor_Surat_Tugas'] .'">';
												echo str_replace("-", "/", $rows['Nomor_Surat_Tugas']);
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Nama Pelaksana SPD: </strong></span>
									<select name="param2" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pegawai yang Ditugaskan</option>
										<?php
											foreach($daftar_pegawai as $rows)
											{
												echo '<option value="'. $rows['NIP'] .'">';
												echo $rows['NIP'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Nomor Surat SPD: </strong></span>
									<input type="text" name="param3" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Tanggal Surat SPD: </strong></span>
									<input type="date" name="param4" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Akun: </strong></span>
									<select name="param5" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Akun MAK</option>
										<?php
											foreach($daftar_mak as $rows)
											{
												echo '<option>';
												echo $rows['MAK'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
							<div id="acc" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Pemeriksa SPD: </strong></span>
									<select name="param6" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Memeriksa SPD</option>
										<?php
											foreach($daftar_pejabat as $rows)
											{
												echo '<option value="'. $rows['Kode_Nama_Jabatan'] .'">';
												echo $rows['Kode_Nama_Jabatan'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Penandatangan SPD: </strong></span>
									<select name="param7" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Menandatangani SPD
										</option>
										<?php
											foreach($daftar_pejabat as $rows)
											{
												echo '<option value="'. $rows['Kode_Nama_Jabatan'] .'">';
												echo $rows['Kode_Nama_Jabatan'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Pemberangkatan: </strong></span>
									<select name="param8" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Menandatangani Pemberangkatan
										</option>
										<?php
											foreach($daftar_pejabat as $rows)
											{
												echo '<option value="'. $rows['Kode_Nama_Jabatan'] .'">';
												echo $rows['Kode_Nama_Jabatan'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Kedatangan: </strong></span>
									<select name="param9" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Menandatangani Kedatangan
										</option>
										<?php
											foreach($daftar_pejabat as $rows)
											{
												echo '<option value="'. $rows['Kode_Nama_Jabatan'] .'">';
												echo $rows['Kode_Nama_Jabatan'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Pemeriksaan Berkas: </strong></span>
									<select name="param10" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Menandatangani Pemeriksaan Berkas
										</option>
										<?php
											foreach($daftar_pejabat as $rows)
											{
												echo '<option value="'. $rows['Kode_Nama_Jabatan'] .'">';
												echo $rows['Kode_Nama_Jabatan'] . ' - ' . $rows['Nama_Lengkap'];
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
							</div>
							<div id="pegawai" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Jumlah Pegawai Berangkat: </strong></span>
									<input type="text" name="param11" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param12" class="form-control" required="required" autofocus>
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
						</div>
					</div>
					<div class="col-md-2"></div>
				</form>
			</div>
		</div>
	</div>
</div>