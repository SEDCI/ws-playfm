	<div class="container login-form">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-sm-offset-4">
				<div class="col-xs-4">
					<div class="logo"></div>
				</div>
				<div class="col-xs-8">
					<h1>Administrator Login</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $validation_errors; ?>
				<div class="well">
					<?php echo form_open('admin/auth'); ?>
						<div class="form-group">
							<label for="adminuser">Username:</label>
							<input type="text" class="form-control" id="adminuser" name="adminuser" maxlength="20" />
						</div>
						<div class="form-group">
							<label for="adminpass">Password:</label>
							<input type="password" class="form-control" id="adminpass" name="adminpass" />
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-danger">Log in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
