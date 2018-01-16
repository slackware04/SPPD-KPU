<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-pencil glyph-menu"></span>
		Daftar Pengeluaran Riil
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Daftar Pengeluaran Riil </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nomor SPD</th>
							
							<th>Tanggal Laporan</th>
							<th>Jumlah Biaya</th>
							
							<!--<th>Persetujuan SPD</th>-->
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data_laporan as $row)
							{
								echo '<tr>';
									echo '<td>' . str_replace("-", "/", $row['Nomor_Surat']) . '</td>';
									if($row['Check'] == null)
									{
										echo '<td>';
										echo '-';
										echo '</td>';
									}
									else
									{
										echo '<td>';
										echo $row['Tanggal_Laporan'];
										echo '</td>';
									}
									if($row['Check'] == null)
									{
										echo '<td>';
										echo '-';
										echo '</td>';
									}
									else
									{
										echo '<td>';
										echo $row['Total_Biaya'];
										echo '</td>';
									}
									if($row['Check'] == null)
									{
										echo '<td>
										<a href="'. base_url('DaftarRiil/insert_form/'. $row['Nomor_Surat']) .'"><button class="btn btn-danger">
											<span class="text-danger glyphicon glyphicon-pencil"></span>
											Buat Laporan
										</button></a>
										</td>';
									}
									else
									{
										echo '<td><a href="'. base_url('DaftarRiil/exportpdf/'.$row['Nomor_Surat']) .'"><button class="btn btn-success">
											<span class="text-success glyphicon glyphicon-file"></span>Export PDF
										</button></a>
										<a href="'. base_url('DaftarRiil/delete/'.$row['Nomor_Surat']) .'"><button class="btn btn-danger">
											<span class="glyphicon glyphicon-trash"></span>
										</button></a>
										</td>';
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