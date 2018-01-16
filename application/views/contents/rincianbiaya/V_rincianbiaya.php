<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-usd glyph-menu"></span>
		Rincian Biaya
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Daftar Rincian Biaya</strong>
				</h4>
			</div>
			<div class="panel-body">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nomor Surat SPD</th>
								<th>Status</th>
								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($daftar_spd as $row)
								{
									echo '<tr>';
									echo '<td>' . str_replace("-", "/", $row['Nomor_Surat']) . '</td>';
									if($row['Check'] == null)
									{
										echo '<td>';
										echo '<span class="text-danger glyphicon glyphicon-remove"></span>';
										echo '</td>';
									}
									else
									{
										echo '<td>';
										echo '<span class="text-success glyphicon glyphicon-ok"></span>';
										echo '</td>';
									}
									if($row['Check'] == null)
									{
										echo '<td>
										<a href="'. base_url('RincianBiaya/insert_form/'. $row['Nomor_Surat']) .'"><button class="btn btn-danger">
											<span class="text-danger glyphicon glyphicon-pencil"></span>
											Bebas
										</button></a>
										<a href="'. base_url('RincianBiaya/insert_form') .'"><button class="btn btn-danger">
											<span class="text-danger glyphicon glyphicon-pencil"></span>
											PMK 33
										</button></a>
										</td>';
									}
									else
									{
										echo '<td><a href="'. base_url('RincianBiaya/details/'.$row['Nomor_Surat']) .'"><button class="btn btn-success">
											Lihat Rincian Biaya
										</button></a>
										<a href="'. base_url('RincianBiaya/delete/'.$row['Nomor_Surat']) .'"><button class="btn btn-danger">
											<span class="text-danger glyphicon glyphicon-trash"></span>
											
										</button></a>
										</td>';
									}
									
									echo '</tr>';
								}
							?>
						</tbody>
					</table>
					
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>