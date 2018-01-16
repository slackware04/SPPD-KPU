<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-home glyph-menu"></span>
		Entitas
	</div>
	<br/>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Data Entitas </strong>
				</h4>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#umum">Data Umum</a></li>
					<li><a data-toggle="tab" href="#lanjutan">Data NPHD</a></li>
				</ul>
				<div class="tab-content">
				<?php
				if($check_entitas == true)
				{
					foreach($data_entitas as $row)
					{
						echo '<div id="umum" class="tab-pane fade in active">
							<ul class="list-group">
								<li href="" class="list-group-item">';
						echo '<strong>Nama Entitas :</strong><div class="right">'. $row['Nama_Entitas'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Alamat Entitas-1 :</strong><div class="right">'. $row['Alamat_Entitas_1'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Alamat Entitas-2 :</strong><div class="right">'. $row['Alamat_Entitas_2'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Telepon :</strong><div class="right">'. $row['No_Telp'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Faximile :</strong><div class="right">'. $row['No_Fax'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Kode Pos :</strong><div class="right">'. $row['Kode_Pos'] . '</div>';
						echo '</li>
							</ul>
						</div>
						<div id="lanjutan" class="tab-pane fade">
							<ul class="list-group">';
						echo '<li href="" class="list-group-item">';
						echo '<strong>Nomor Naskah Perjanjian Hibah Daerah - 1 :</strong><div class="right">'. $row['Naskah_Hibah_1'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tanggal Naskah Perjanjian Hibah Daerah - 1 :</strong><div class="right">'. $row['Tanggal_Hibah_1'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Naskah Perjanjian Hibah Daerah - 2 :</strong><div class="right">'. $row['Naskah_Hibah_2'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tanggal Naskah Perjanjian Hibah Daerah - 2 :</strong><div class="right">'. $row['Tanggal_Hibah_2'] . '</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tahun Anggaran :</strong><div class="right">'. $row['Tahun_Anggaran'] . '</div>';
						echo '</li></ul>';
						
						echo '<div class="left"><a href="'. base_url('Entitas/insert') .'">
								<button disabled class="btn btn-primary">
									Insert
								</button>
							</a>';
						echo '<a href="'. base_url('Entitas/update_form') .'">
							<button class="btn btn-success">
								Update
							</button>
							</a></div>';
						echo '<div class="right"><a href="'. base_url('Entitas/reset') .'">
						<button class="btn btn-danger">
							Delete
						</button>
						</a></div>';
						echo '</div>';
						
					}
				}
				else
				{
					echo '<div id="umum" class="tab-pane fade in active">
							<ul class="list-group">
								<li href="" class="list-group-item">';
						echo '<strong>Nama Entitas :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Alamat Entitas-1 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Alamat Entitas-2 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Telepon :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Faximile :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Kode Pos :</strong><div class="right">-</div>';
						echo '</li>
							</ul>
						</div>
						<div id="lanjutan" class="tab-pane fade">
							<ul class="list-group">';
						echo '<li href="" class="list-group-item">';
						echo '<strong>Nomor Naskah Perjanjian Hibah Daerah - 1 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tanggal Naskah Perjanjian Hibah Daerah - 1 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Nomor Naskah Perjanjian Hibah Daerah - 2 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tanggal Naskah Perjanjian Hibah Daerah - 2 :</strong><div class="right">-</div>';
						echo '</li><li href="" class="list-group-item">';
						echo '<strong>Tahun Anggaran :</strong><div class="right">-</div>';
						echo '</li></ul>';
						
						echo '<div class="left"><a href="'. base_url('Entitas/insert_form') .'">
								<button class="btn btn-primary">
									Insert
								</button>
							</a>';
						echo '<a href="'. base_url('Entitas/update_form') .'">
						<button disabled class="btn btn-success">
								Update
							</button></a></div>';
						echo '<div class="right"><a href="'. base_url('Entitas/reset') .'">
						<button disabled class="btn btn-danger">
							Delete
						</button>
						</a></div>';
						echo '</div>';
				}
				
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<center>
			<img class="img-thumbnail" src="<?php echo base_url('assets/img/kpu-tigaraksa.jpeg'); ?>" width="90%"/>
		</center>
	</div>
</div>