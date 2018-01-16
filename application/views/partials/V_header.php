
<div class="col-md-12 header">
	<div class="col-md-5">
		<h5>SISTEM ADMINISTRASI & PENGENDALIAN PERJALANAN DINAS PEGAWAI</h5>
	</div>
	<div class="col-md-4">
		<div class="right">
			<h5>Selamat datang, <?php echo $this->session->userdata('name') . ' ('. $this->session->userdata('role') .')'; ?> <a href="<?php echo base_url('Login/do_logout'); ?>">(Logout)</a></h5>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" id="usr" placeholder="Search">
			<span class="glyphicon glyphicon-search form-control-feedback text-info"></span>
		 </div>
	</div>
	
</div>
