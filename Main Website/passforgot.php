<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';
?>
<?php
/*
** Set page header using the setHeader() function
*/
setHeader('Password Forgot');
?>

  <body>

    <?php setNavigation('passforgot'); ?>

    <div style="margin-top: 70px;" class="row">
		<div class="container">
			<div class="col-xs-6 col-md-6 ">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Forgot Password</h3>
				  </div>
				  <div class="panel-body">
						<div class="well" style="text-align: center;">
							<form class="form-horizontal">
							<fieldset>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="username">Username</label>
							  <div class="controls">
								<input id="username" name="username" type="text" placeholder="Username" class="input-xlarge">
							  </div>
							</div>

							<!-- Button (Double) -->
							<div class="control-group">
							  <label class="control-label" for="reset"></label>
							  <div class="controls">
								<button id="resetpass" name="resetpass" class="btn btn-warning">Reset Password</button>
							  </div>
							</div>

							</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> <!--./row -->
	</div> <!--./container -->
	
<?php
setFooter();
?>
  </body>
</html>