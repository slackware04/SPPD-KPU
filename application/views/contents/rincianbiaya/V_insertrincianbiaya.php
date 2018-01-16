<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-usd glyph-menu"></span>
		Rincian Biaya
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Rincian Biaya</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('RincianBiaya/insert'); ?>" method="post">
					<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#umum">Data Umum Rincian Biaya</a></li>
						<li><a data-toggle="tab" href="#1">Biaya (1)</a></li>
						<li><a data-toggle="tab" href="#2">Biaya (2)</a></li>
						<li><a data-toggle="tab" href="#3">Biaya (3)</a></li>
						<li><a data-toggle="tab" href="#4">Biaya (4)</a></li>
						<li><a data-toggle="tab" href="#5">Biaya (5)</a></li>
						<li><a data-toggle="tab" href="#6">Biaya (6)</a></li>
						<li><a data-toggle="tab" href="#7">Biaya (7)</a></li>
						<li><a data-toggle="tab" href="#8">Biaya (8)</a></li>
					</ul>
						<div class="tab-content">
							<div id="umum" class="tab-pane fade in active">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Nomor SPD: </strong></span>
									<input type="text" name="param1" class="form-control" required="required" autofocus readonly value="<?php foreach($surat_spd as $spd){echo $spd['Nomor_Surat_SPD'];} ?>">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Tanggal Rincian: </strong></span>
									<input type="date" name="param2" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									ACC Pejabat: </strong></span>
									<select name="param3" class="form-control" required="required" autofocus>
										<option disabled selected>Pilih Pejabat yang Memeriksa dan Menyetujui</option>
										<?php
											foreach($daftar_pejabat as $pejabat)
											{
												echo '<option value="'. $pejabat['Kode_Nama_Jabatan'] .'">';
												echo $pejabat['Kode_Nama_Jabatan'] . ' (' . $pejabat['Nama_Lengkap'] . ')';
												echo '</option>';
											}
										?>
									</select>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>
									Akun: </strong></span>
									<select name="param4" class="form-control" required="required" autofocus>
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
								<span class="total-biaya">
									<?php 
										foreach($daftar_mak as $biaya)
										{
											echo $biaya['Jumlah_Anggaran'];
										}
									?>
								</span>
							</div>
							<div id="1" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Uang Harian Perjalanan Dinas Dalam Negeri">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" name="param5" class="form-control" id="biaya1" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" name="param6" id="satuan1" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param7" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
									
								</div>
							</div>
							<div id="2" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Uang Representasi">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya2" name="param8" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" name="param9" id="satuan2" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param10" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="3" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Uang Harian Kegiatan Rapat Pertemuan di Luar Kantor">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya3" name="param11" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text"  id="satuan3" name="param12" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param13" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="4" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Biaya Penginapan Perjalanan Dinas DN">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" name="param14"  id="biaya4" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" id="satuan4"  name="param15" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param16" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="5" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Biaya Transport Lokal Dalam Kota">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya5" name="param17" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" id="satuan5" name="param18" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param19" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="6" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Biaya Transportasi Darat Antar Kota">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya6" name="param20" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" id="satuan6" name="param21" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param22" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="7" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Biaya Tiket Pesawat Perjalanan DN">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya7" name="param23" class="form-control" required="required" value="0" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" id="satuan7" name="param24" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param25" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
							</div>
							<div id="8" class="tab-pane fade">
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Rincian Biaya: </strong></span>
									<input type="text" name="paramX" class="form-control" required="required" autofocus readonly value="Biaya Transportasi ke dari Airport">
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Harga Satuan: </strong></span>
									<input type="text" id="biaya8" name="param26" value="0" class="form-control" required="required" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Satuan: </strong></span>
									<?php 
										foreach($tanggal as $sat)
										{
											$diff = date_diff(date_create($sat['Tanggal_Berangkat']), date_create($sat['Tanggal_Kembali']));
											echo '<input readonly type="text" id="satuan8" name="param27" class="form-control" required="required" autofocus value="'. $diff->format('%d') .'">';
										}
									?>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback input-group">
									<span class="input-group-addon"><strong>Keterangan: </strong></span>
									<input type="text" name="param28" class="form-control" required="required" value="-" autofocus>
									<span class="glyphicon glyphicon-user form-control-feedback"></span>
								</div>
								<div class="control-biaya">
									<strong>Jumlah Anggaran:</strong> Rp. 
									<span class="biaya">
										<?php 
											foreach($daftar_mak as $biaya)
											{
												echo $biaya['Jumlah_Anggaran'];
											}
										?>
									</span>
								</div>
								<div class="col-md-3">
									<button type="reset" class="btn btn-success btn-block btn-flat btn-login" value="login" name="login">Reset</button>
								</div>
								<div class="col-md-6">
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary btn-block btn-flat btn-login" value="login" name="login">Submit</button>
								</div>
							</div>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>
</div>