<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>" />
		<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
	
	</head>
	<body>
		<br/>
		<br/>
		<div class="container">
			<div class="row">
				
				<?php $this->load->view($content); ?>
			</div>
		</div>
		
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>