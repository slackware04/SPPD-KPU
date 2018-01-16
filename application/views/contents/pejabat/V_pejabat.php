<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-user glyph-menu"></span>
		Pejabat
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Data Pejabat </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Kode Nama Jabatan</th>
							<th>Nama Jabatan</th>
							<th>NIP</th>
							<th>Nama Pegawai</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_pejabat as $row)
							{
								echo '<tr>';
								echo '<td>' . $row['Kode_Nama_Jabatan'] . '</td>';
								echo '<td>' . $row['Nama_Jabatan'] . '</td>';
								echo '<td>' . $row['NIP'] . '</td>';
								echo '<td>' . $row['Nama_Lengkap'] . '</td>';
								echo '<td>';
								echo '<a href="'. base_url('Pejabat/delete/' . $row['NIP']) .'"><button class="btn btn-danger">Delete</button></a>';
								echo '</td>';
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
				<a href="<?php echo base_url('Pejabat/insert_form'); ?>">
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