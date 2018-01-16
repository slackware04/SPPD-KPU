<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-plane glyph-menu"></span>
		Surat Tugas
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Surat Tugas</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('SuratTugas/insert'); ?>" method="post">
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nomor Surat: </strong></span>
							<input type="text" name="param1" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Surat: </strong></span>
							<input type="date" name="param2" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Maksud Perj. Dinas: </strong></span>
							<input type="text" name="param3" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tujuan Perj. Dinas: </strong></span>
							<input type="text" name="param4" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Angkutan: </strong></span>
							<select name="param5" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Angkutan yang Digunakan</option>
								<option value="Pesawat Udara">Angkutan Udara (Pesawat)</option>
								<option value="Angkutan daratlaut">Angkutan Darat/Laut</option>
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Berangkat: </strong></span>
							<input type="date" name="param6" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Kembali: </strong></span>
							<input type="date" name="param7" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Jumlah Pegawai: </strong></span>
							<input type="text" name="param8" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Pejabat: </strong></span>
							<select name="param9" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Pejabat yang Menandatangani</option>
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
							<span class="input-group-addon"><strong>Dasar Surat: </strong></span>
							<Textarea name="paramX" class="form-control" required="required" autofocus></textarea>
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
				</form>
			</div>
		</div>
	</div>
</div>