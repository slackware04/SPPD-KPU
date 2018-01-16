<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-usd glyph-menu"></span>
		Anggaran
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Data Anggaran </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>MAK</th>
							<th>Nama Akun</th>
							<th>Jumlah Anggaran</th>
							<th>Jenis Kegiatan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_anggaran as $row)
							{
								echo '<tr>';
								echo '<td>' . $row['MAK'] . '</td>';
								echo '<td>' . $row['Nama_Kegiatan'] . '</td>';
								echo '<td>Rp. ' . $row['Jumlah_Anggaran'] . '</td>';
								echo '<td>' . $row['Jenis_Kegiatan'] . '</td>';
								echo '<td>';
								echo '<a href="'. base_url('Anggaran/delete/' . $row['MAK']) .'"><button class="btn btn-danger">Delete</button></a>';
								echo '</td>';
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
				<a href="<?php echo base_url('Anggaran/insert_form'); ?>">
					<button class="btn btn-primary">
						Insert
					</button>
				</a>
			</div>
		</div>
	</div>
</div>