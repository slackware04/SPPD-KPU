<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-user glyph-menu"></span>
		Pegawai
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Data Pegawai </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama Pegawai</th>
							<th>Golongan</th>
							<th>Jabatan</th>
							<th>Tanggal Lahir</th>
							<th>Unit Kerja</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_pegawai as $row)
							{
								echo '<tr>';
								echo '<td>' . $row['NIP'] . '</td>';
								echo '<td>' . $row['Nama_Lengkap'] . '</td>';
								echo '<td>' . $row['Pangkat_Golongan'] . '</td>';
								echo '<td>' . $row['Jabatan'] . '</td>';
								echo '<td>' . $row['Tanggal_Lahir'] . '</td>';
								echo '<td>' . $row['Unit_Kerja'] . '</td>';
								echo '<td>';
								echo '<a href="'. base_url('Pegawai/delete/' . $row['NIP']) .'"><button class="btn btn-danger">Delete</button></a>';
								echo '</td>';
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
				<a href="<?php echo base_url('Pegawai/insert_form'); ?>">
					<button class="btn btn-primary">
						Insert
					</button>
				</a>
				
				<div class="right">
				
					<?php echo $links ?>
				</div>
			</div>
		</div>
	</div>
</div>