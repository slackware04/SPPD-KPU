<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-user glyph-menu"></span>
		Anggaran
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Anggaran</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('Anggaran/insert'); ?>" method="post">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>MAK: </strong></span>
							<input type="text" name="param1" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-tag form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nama Akun: </strong></span>
							<input type="text" name="param2" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-tree-deciduous form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Jumlah Anggaran: </strong></span>
							<input type="text" name="param3" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-usd form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Jenis Kegiatan: </strong></span>
							<select name="param4" class="form-control" required="required" autofocus>
								<option disabled selected>Pilih Jenis Kegiatan</option>
								<option>Dalam Kota</option>
								<option>Luar Kota</option>
								<option>Dalam dan Luar Kota</option>
								<option>Rapat Dalam Kantor</option>
								<option>Rapat Luar Kota</option>
							</select>
							<span class="glyphicon glyphicon-th-list form-control-feedback"></span>
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