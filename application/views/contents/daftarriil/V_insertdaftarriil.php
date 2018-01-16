<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-pencil glyph-menu"></span>
		Daftar Pengeluaran Riil
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Daftar Pengeluaran Riil</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('DaftarRiil/insert'); ?>" method="post">
					
					<div class="col-md-2"></div>
					<div class="col-md-8">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#umum">Data Umum Laporan</a></li>
						<li><a data-toggle="tab" href="#biaya">Data Jenis Biaya</a></li>
					</ul>
					
						<div class="tab-content">
							<div id="umum" class="tab-pane fade in active">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Nomor Surat SPD: </strong></span>
									<input type="text" name="param1" class="form-control" required="required" autofocus readonly value="<?php echo $no_laporan; ?>">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Tanggal Surat SPD: </strong></span>
									<input type="date" name="param2" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Pemeriksa Laporan: </strong></span>
									<select name="param3" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Memeriksa Laporan</option>
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
									Penyetuju Laporan: </strong></span>
									<select name="param4" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Menyetujui Laporan</option>
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
							<div id="biaya" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Jumlah Jenis Biaya: </strong></span>
									<input type="text" name="param5" class="form-control" required="required" autofocus>
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