<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-home glyph-menu"></span>
		Entitas
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Pegawai</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('Pegawai/insert'); ?>" method="post">
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>NIP: </strong></span>
							<input type="text" name="param1" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nama Lengkap: </strong></span>
							<input type="text" name="param2" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Pangkat/Golongan: </strong></span>
							<select name="param3" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Golongan/Pangkat Pegawai</option>
								<option value="Ia">Ia - Juru Muda</option>
								<option value="Ib">Ib - Juru Muda Tingkat I</option>
								<option value="Ic">Ic - Juru</option>
								<option value="Id">Id - Juru Tingkat I</option>
								<option value="IIa">IIa - Pengatur Muda</option>
								<option value="IIb">IIb - Pengatur Muda Tingkat I</option>
								<option value="IIc">IIc - Pengatur</option>
								<option value="IId">IId - Pengatur Tingkat I</option>
								<option value="IIIa">IIIa - Penata Muda</option>
								<option value="IIIb">IIIb - Penata Muda Tingkat I</option>
								<option value="IIIc">IIIc - Penata </option>
								<option value="IIId">IIId - Penata Tingkat I</option>
								<option value="IVa">IVa - Pembina</option>
								<option value="IVb">IVb - Pembina Tingkat I</option>
								<option value="IVc">IVc - Pembina Utama Muda</option>
								<option value="IVd">IVd - Pembina Utama Madya</option>
								<option value="IVe">IVe - Pembina Utama</option>
								<option value="Non">Non Golongan/Eselon</option>
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Jabatan: </strong></span>
							<input type="text" name="param4" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tingkat Peraturan PD: </strong></span>
							<select name="param5" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Tingkat Peraturan Perjalanan Dinas Pegawai</option>
								<option value="A">Tingkat A untuk Pejabat Negara</option>
								<option value="B">Tingkat B untuk Pejabat Negara Lainnya dan Eselon I</option>
								<option value="C">Tingkat C untuk Pejabat Eselon II</option>
								<option value="D">Tingkat D untuk Pejabat Eselon III/Golongan IV</option>
								<option value="E">Tingkat E untuk Pejabat Eselon IV/Golongan III</option>
								<option value="F">Tingkat F untuk ASN Golongan II/I</option>
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Lahir: </strong></span>
							<input type="date" name="param6" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Unit Kerja: </strong></span>
							<input type="text" name="param7" class="form-control" required="required" autofocus>
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