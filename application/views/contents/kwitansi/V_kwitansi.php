<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-tags glyph-menu"></span>
		Kwitansi
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Daftar Kwitansi</strong>
				</h4>
			</div>
			<div class="panel-body">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nomor Surat SPD</th>
								<th>Nomor Kwitansi</th>
								<th>Tanggal Kwitansi</th>
								<th>ACC</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($daftar_kwitansi as $row)
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
										echo $row['Nomor_Kwitansi'];
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
										echo $row['Tanggal_Kwitansi'];
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
										echo $row['Pejabat'];
										echo '</td>';
									}
									if($row['Check'] == null)
									{
										echo '<td>
										<a href="'. base_url('Kwitansi/insert_form/'. $row['Nomor_Surat']) .'"><button class="btn btn-danger">
											<span class="text-danger glyphicon glyphicon-pencil"></span>
											Buat Kwitansi
										</button></a>
										</td>';
									}
									else
									{
										echo '<td><a href="'. base_url('Kwitansi/exportpdf/'.$row['Nomor_Surat']) .'"><button class="btn btn-success">
											<span class="text-success glyphicon glyphicon-file"></span>Export PDF
										</button></a>
										<a href="'. base_url('Kwitansi/delete/'.$row['Nomor_Surat']) .'"><button class="btn btn-danger">
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
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>