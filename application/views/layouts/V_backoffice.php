<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>" />
		<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
		
	</head>
	<body>
		<?php
			if($this->session->flashdata('message'))
			{
				echo $this->session->flashdata('message');
			}
			else
			{
				
			}
			
		?>
		<div class="container-fluid">
			<div class="row">
				<?php $this->load->view('partials/V_header'); ?>
				<?php $this->load->view('partials/V_menu'); ?>
				<?php $this->load->view($content); ?>
				<?php $this->load->view('partials/V_footer'); ?>
			</div>
		</div>
		
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>