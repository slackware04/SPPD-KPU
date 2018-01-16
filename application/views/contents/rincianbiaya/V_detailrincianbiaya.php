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
					<strong>Detail Rincian Biaya</strong>
				</h4>
			</div>
			<div class="panel-body">
				
				<div class="col-md-4">
					<ul class="list-group">
						<li href="" class="list-group-item">
							<strong><center>Informasi Umum</center></strong>
						</li>
						<?php
							foreach($detail_biaya as $umum)
							{
								echo '<li href="" class="list-group-item">
								<strong>Nomor Surat :</strong>
								<div class="right">';
								echo $umum['Nomor_Surat_SPD'];	
								echo '</div>
									</li>';
								
								echo '<li href="" class="list-group-item">
								<strong>Tanggal Rincian Biaya :</strong>
								<div class="right">';
								echo $umum['Tanggal_Rincian_Biaya'];	
								echo '</div>
									</li>';
									
								echo '<li href="" class="list-group-item">
								<strong>Pejabat yang Menyetujui :</strong>
								<div class="right">';
								echo $umum['Pejabat'];	
								echo '</div>
									</li>';
									
								echo '<li href="" class="list-group-item">
								<strong>MAK :</strong>
								<div class="right">';
								echo $umum['Akun'];	
								echo '</div>
									</li>';
								
								echo '<li href="" class="list-group-item">
								<strong>Total Biaya :</strong>
								<div class="right">Rp ';
								echo ($umum['Harga_Satuan_1'] * $umum['Satuan_1']) + ($umum['Harga_Satuan_2'] * $umum['Satuan_2']) + ($umum['Harga_Satuan_3'] * $umum['Satuan_3']) + ($umum['Harga_Satuan_4'] * $umum['Satuan_4']) + ($umum['Harga_Satuan_5'] * $umum['Satuan_5']) + ($umum['Harga_Satuan_6'] * $umum['Satuan_6']) + ($umum['Harga_Satuan_7'] * $umum['Satuan_7']) + ($umum['Harga_Satuan_8'] * $umum['Satuan_8']);	
								echo '</div>
									</li>';
							}
						
						?>
					</ul>
					
				</div>
				<div class="col-md-8">
					<ul class="list-group">
						<li href="" class="list-group-item">
							<strong><center>Detail Biaya</center></strong>
						</li>
						<?php
							foreach($detail_biaya as $biaya)
							{
								echo '<li class="list-group-item"><strong>Perjalanan Dinas Dalam Negeri : </strong>'. $biaya['Harga_Satuan_1']*$biaya['Satuan_1'] .'
								<div class="right">
								<strong>Uang Representasi : </strong>'. $biaya['Harga_Satuan_2']*$biaya['Satuan_2'] .'
								</div>
								</li>';
								
								echo '<li class="list-group-item"><strong>Kegiatan Rapat Pertemuan di Luar Kantor : </strong>'. $biaya['Harga_Satuan_3']*$biaya['Satuan_3'] .'
								<div class="right">
								<strong>Biaya Penginapan Perjalanan Dinas DN : </strong>'. $biaya['Harga_Satuan_4']*$biaya['Satuan_4'] .'
								</div>
								</li>';
								
								echo '<li class="list-group-item"><strong>Perjalanan Dinas Dalam Negeri : </strong>'. $biaya['Harga_Satuan_5']*$biaya['Satuan_5'] .'
								<div class="right">
								<strong>Biaya Transport Lokal Dalam Kota : </strong>'. $biaya['Harga_Satuan_6']*$biaya['Satuan_6'] .'
								</div>
								</li>';
								
								echo '<li class="list-group-item"><strong>Biaya Transportasi Darat Antar Kota : </strong>'. $biaya['Harga_Satuan_7']*$biaya['Satuan_7'] .'
								<div class="right">
								<strong>Biaya Tiket Pesawat Perjalanan DN : </strong>'. $biaya['Harga_Satuan_8']*$biaya['Satuan_8'] .'
								</div>
								</li>';
							}
						?>
					</ul>
				
				</div>
				
			</div>
		</div>
	</div>
</div>