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
					<span class="glyphicon glyphicon-user glyph-menu"></span>
					<strong>Masukkan Data Pegawai yang Ditugaskan</strong>
				</h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('SuratPerjalananDinas/insert_pegawai/'. str_replace("/", "-", $no_surat) . '/' .$jumlah_pegawai); ?>" method="post">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group has-feedback input-group">
							<span class="input-group-addon"><strong>Nomor Surat Perjalanan Dinas: </strong></span>
							<input type="text" name="param0" class="form-control" required="required" autofocus readonly value="<?php echo $no_surat; ?>">
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<?php
						$i = 1;
						while($i <= $jumlah_pegawai)
						{
							echo '<div class="form-group has-feedback input-group">
							<span class="input-group-addon">Nama Pengikut ('. $i .'): </span>';

								echo '<input type="text" name="param'. $i .'" class="form-control" required="required" autofocus>';
								
							echo '</div>';
							
							echo '<div class="form-group has-feedback input-group">
							<span class="input-group-addon">Keterangan: </span>';

								echo '<input type="text" name="ket'. $i .'" class="form-control" required="required" autofocus>';
								
							echo '</div>';
							$i++;
						}
							
						?>
						
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