<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';

$user = new User;
$failed = false;
if($user->isLoggedIn()){
	Redirect::to('index');	
}
if(Input::exists()){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'display_name' => 'Username'
			),
			'password' => array(
				'required' => true,
				'display_name' => 'Password'
			)
		));

		if($validation->passed()) {

			$remember = (Input::get('remember') === 'on') ? true : false;
			$login    = $user->login(Input::get('username'), Input::get('password'), $remember);
			
			if($remember){	
			
			}else{
			}


			if($login) {
				Redirect::to('profile/' . Input::get('username'));
				//Redirect::to('index');
			} else {
				die("Need to do something here, or kill Jack R.");			
				}
		}else{
			$errors = $validation->errors();
			$failed = true;
		}
	}
?>
<?php
/*
** Set page header using the setHeader() function
*/
setHeader('Login');
?>

  <body>

<?php setNavigation('login'); ?>

    <div style="margin-top: 70px;" class="row">
		<div class="container">
			<div class="col-xs-8 col-md-8 ">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				  </div>
				  <div class="panel-body">
						<div class="well" style="text-align: center;">
                        
							<?php
							if($failed){	
								 foreach($errors as $error) {
									echo '
									<div class="alert alert-dismissable alert-danger">
									  <button type="button" class="close" data-dismiss="alert">x</button>
									  <strong>'. $error .'</strong>
									</div>';
								}
								$errors = null;
							}?>

							<form class="form-horizontal" method="post" action="">
							<fieldset>

							<!-- Form Name -->
							<legend>Login</legend>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="username">Username</label>  
							  <div class="col-md-4">
							  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
							    
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="password">Password</label>
							  <div class="col-md-4">
							    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
							    
							  </div>
							</div>

							<!-- Multiple Checkboxes -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="remember"></label>
							  <div class="col-md-4">
							  <div class="checkbox">
							    <label for="remember-0">
							      <input type="checkbox" name="remember" id="remember-0" value="1">
							      Remember Me
							    </label>
								</div>
							  </div>
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="signin"></label>
							  <div class="col-md-8">
							    <button id="signin" name="signin" class="btn btn-success">Login</button>
							  </div>
							</div>

							</fieldset>
							</form>

						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-md-4 ">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Forgot Password</h3>
				  </div>
				  <div class="panel-body">
						<div class="well" style="text-align: center;">
							Have you forgotten your password? <a href="passforgot">Click Here</a>
						</div>
					</div>
				</div>
			</div><div class="col-xs-4 col-md-4 ">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				  </div>
				  <div class="panel-body">
						<div class="well" style="text-align: center;">
							Need to register a account? <a href="register">Click Here</a>
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