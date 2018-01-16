<div class="col-md-10 content">
	<div class="content-header">
		<span class="glyphicon glyphicon-ok glyph-menu"></span>
		Persetujuan
	</div>
	<br/>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>
					<span class="glyphicon glyphicon-tasks glyph-menu"></span>
					<strong>Daftar Surat yang Perlu Disetujui </strong>
				</h4>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No Dokumen</th>
							<th>Jenis Dokumen</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($list_surat as $row)
							{
								echo '<tr>';
								echo '<td>' . str_replace("-", "/", $row['Nomor_Surat']) . '</td>';
								echo '<td>' . $row['Jenis_Surat'] . '</td>';
								echo '<td>' . $row['Status'] . '</td>';
								echo '<td>';
								
								if($row['Status'] == 'belum acc')
								{
									echo '<a href="'. base_url('Persetujuan/acc/' . $row['Nomor_Surat']) .'"><button class="btn btn-success"><span class="glyphicon glyphicon-ok glyph-menu"></span>ACC</button></a>';
								}
								else
								{
									echo '<span class="glyphicon glyphicon-ok glyph-menu"></span>';
								}
								
								echo '</td>';
								echo '</tr>';
							}
							
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>