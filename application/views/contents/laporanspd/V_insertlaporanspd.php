<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-plane glyph-menu"></span>
		Laporan SPD
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Masukkan Data Laporan SPD</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('LaporanSPD/insert'); ?>" method="post">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nomor Surat: </strong></span>
							<input type="text" name="param1" class="form-control" required="required" autofocus readonly value="<?php echo $no_surat; ?>">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Laporan: </strong></span>
							<input type="date" name="param2" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Dinas/Instansi yang Dikunjungi: </strong></span>
							<input type="text" name="param3" class="form-control" required="required" autofocus value="">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Hasil: </strong></span>
							<input type="text" name="param4" class="form-control" required="required" autofocus value="">
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