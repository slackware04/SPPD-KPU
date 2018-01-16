
<div class="login-box col-md-4 col-md-offset-4">
	<div class="panel panel-default login-box">
		<div class="panel-heading login-box-title-top">
			SYSTEM LOGIN
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url('Login/do_login'); ?>" method="post">
				<div class="form-group has-feedback">
					<input type="text" name="param1" class="form-control" placeholder="Enter Username" required="required" autofocus>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="param2" class="form-control" placeholder="Enter Password" required="required" autofocus>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-md-8">
						<?php
							if($this->session->flashdata('error_login'))
							{
								echo $this->session->flashdata('error_login');
							}
							else
							{
								
								
							}
						?>
						
					</div>
					
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat btn-login" value="login" name="login">Login</button>
						<br />
					
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
