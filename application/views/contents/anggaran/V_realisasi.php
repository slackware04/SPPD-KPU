<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-usd glyph-menu"></span>
		Realisasi Anggaran
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Data Realisasi Anggaran </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>MAK</th>
							<th>Nama Kegiatan</th>
							<th>Jumlah Anggaran</th>
							<th>Realisasi</th>
							<th>Presentase</th>
							
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
								$total_pengeluaran = $row['total1'] + $row['total2'] + $row['total3'] + $row['total4'] + $row['total5'] + $row['total6'] + $row['total7'] + $row['total8'];
								echo '<td>Rp. ' . $total_pengeluaran . '</td>';
								
								if($row['Jumlah_Anggaran'] == 0)
								{
									echo '<td>-</td>';
								}
								else
								{
									echo '<td>'. $total_pengeluaran/$row['Jumlah_Anggaran']*100 . '%</td>';
								}
								
								
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>