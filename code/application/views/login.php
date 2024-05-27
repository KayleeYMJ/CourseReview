<style>
	#login-form{
		margin-top: 40px;
	}
	#login-form div{
		margin-top: 30px;
	}
</style>

<div class="container" id="login-form">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'login/check_login'); ?>
				<h2 class="text-center">Log in</h2>       
					<div class="form-group">
						<h5>User Name</h5>
						<input type="text" class="form-control" placeholder="Username" required="required" name="username" value='<?php if (get_cookie('remember')) echo get_cookie('username') ?>'>
					</div>
					<div class="form-group">
					    <h5>Password</h5>
						<input type="password" class="form-control" placeholder="Password" required="required" name="password" value='<?php if (get_cookie('remember')) echo get_cookie('password') ?>'>
					</div>
					
					<div class="form-group">
					    <?php echo $error; ?>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Log in</button>
					</div>
			<?php echo form_close(); ?>
	</div>
</div>

