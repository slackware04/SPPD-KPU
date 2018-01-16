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
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Daftar Surat Perjalanan Dinas </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nomor SPD</th>
							<th>Nama Pelaksana</th>
							<th>Tanggal SPD</th>
							<th>Nomor Surat Tugas</th>
							<th>Akun</th>
							<!--<th>Persetujuan SPD</th>-->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_surat as $row)
							{
								echo '<tr>';
								echo '<td>' . str_replace("-", "/", $row['Nomor_Surat_SPD']) . '</td>';
								echo '<td>' . $row['Nama_Lengkap'] . '</td>';
								echo '<td>' . $row['Tanggal_Surat_SPD'] . '</td>';
								echo '<td>' . str_replace("-", "/", $row['Nomor_Surat_Tugas']) . '</td>';
								echo '<td>' . $row['Akun'] . '</td>';
								//echo '<td>';
								//echo $row['Persetujuan'];
								//echo '</td>';
								echo '<td>';
								echo '<a href="'. base_url('SuratPerjalananDinas/delete/' . $row['Nomor_Surat_SPD']) .'"><button class="btn btn-danger">Delete</button></a>';
								echo ' ';
								echo '<a href="'. base_url('SuratPerjalananDinas/detail/' . $row['Nomor_Surat_SPD']) .'"><button class="btn btn-warning">Detail</button></a>';
								echo '</td>';
								echo '</tr>';
							}
						?>
					</tbody>
				</table>
				<a href="<?php echo base_url('SuratPerjalananDinas/insert_form'); ?>">
					<button class="btn btn-primary">
						Insert
					</button>
				</a>
			</div>
		</div>
	</div>
</div>