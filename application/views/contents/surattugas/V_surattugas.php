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
					<strong>Daftar Surat Tugas </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nomor Surat</th>
							<th>Tanggal Surat</th>
							<th>Tujuan</th>
							<th>Tanggal Berangkat</th>
							<th>Persetujuan ST</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_surat as $row)
							{
								echo '<tr>';
								echo '<td>' . str_replace("-", "/", $row['Nomor_Surat_Tugas']) . '</td>';
								echo '<td>' . $row['Tanggal_Surat_Tugas'] . '</td>';
								echo '<td>' . $row['Tujuan_Perjalanan_Dinas'] . '</td>';
								echo '<td>' . $row['Tanggal_Berangkat'] . '</td>';
								echo '<td>';
								echo '<button class="btn btn-success">
								<span class="glyphicon glyphicon-ok"></span>
								</button> - '. $row['Pejabat_yang_Menandatangani'];
								echo '</td>';
								echo '<td>';
								
								/*
								foreach()
								{
									
								}
								*/
								echo '<a href="'. base_url('SuratTugas/delete/' . $row['Nomor_Surat_Tugas']) .'"><button class="btn btn-danger">Delete</button></a>';
								echo '  ';
								echo '<a href="'. base_url('SuratTugas/detail/' . $row['Nomor_Surat_Tugas']) .'"><button class="btn btn-warning">Detail</button></a>';
								echo '</td>';
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
				<a href="<?php echo base_url('SuratTugas/insert_form'); ?>">
					<button class="btn btn-primary">
						Insert
					</button>
				</a>
			</div>
		</div>
	</div>
</div>