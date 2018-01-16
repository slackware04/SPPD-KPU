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
					<strong>Masukkan Data Entitas </strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('Entitas/insert'); ?>" method="post">
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nama Entitas: </strong></span>
							<input type="text" name="param1" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Alamat Entitas (1): </strong></span>
							<input type="text" name="param2" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-home form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Alamat Entitas (2): </strong></span>
							<input type="text" name="param3" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-home form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>No Telp: </strong></span>
							<input type="text" name="param4" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>No Fax: </strong></span>
							<input type="text" name="param5" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Kode Pos: </strong></span>
							<input type="text" name="param6" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
					
					</div>
					<div class="col-md-6">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nomor Naskah (1) : </strong></span>
							<input type="text" name="param7" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-tag form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Naskah (1)</strong></span>
							<input type="date" name="param8" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nomor Naskah (2) :</strong></span>
							<input type="text" name="param9" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-tag form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tanggal Naskah (2) : </strong></span>
							<input type="date" name="param10" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Tahun Anggaran : </strong></span>
							<input type="text" name="param11" class="form-control" required="required" autofocus>
							<span class="glyphicon glyphicon-usd form-control-feedback"></span>
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