<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';

?>
<?php
if(Input::exists()) {
		$validate   = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'display_name' => 'Username',
				'required' => true,
				'min' => 3,
				'max' => 30,
				'unique' => 'users',
				'minecraft' => true
			),
			'password' => array(
				'display_name' => 'Password',
				'required' => true,
				'min' => 6
			),
			'password_again' => array(
				'display_name' => 'Second Password',
				'required' => true,
				'matches' => 'password'
			),
			'name' => array(
				'display_name' => 'Your Name',
				'required' => true,
				'max' => 50
			),
			'email' => array(
				'display_name' => 'Email',
				'required' => true,
				'max' => 75
			)
		));
		if($validation->passed()){
			
			$user = new User();
			$salt = Hash::salt(32);

			try {

				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
			        'email' => Input::get('email'),
					'temp_password' => Hash::unique(),
					'joined' => date('Y-m-d'),
					'group' => 1,
					'verified' => 0,
					'current_ip' => $_SERVER['REMOTE_ADDR']
				));

				$emailfrom = $_POST["name"];
			    $emailadd = $_POST["email"];
			    $emailusername = $_POST["username"];
				$header = "From: NoReply@MineAlert.net\r\n";
			    $message = wordwrap($message, 70);
			    mail($emailadd,"MineAlert.net Account Creation",
			    	"Thank You $emailfrom For Registering At MineAlert!\n Username: $emailusername",$header);

				Session::flash('home', 'You have been registered!');
				Redirect::to('index');

			} catch(Exception $e) {
				die($e->getMessage());
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
setHeader('Register');
?>

  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MineAlert</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index">Home</a></li>
            <li><a href="contact">Contact Us</a></li>
			<li><a href="servers">Servers</a></li>
			<li><a href="team">MineAlert Team</a></li>
          </ul>
		<ul class="nav navbar-nav navbar-right">
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="login"><i class="fa fa-sign-in"></i> Login</a></li>
			  <li class="active"><a href="register"><i class="fa fa-edit"></i> Register</a></li>
			  <li><a href="passforgot"> Forgot Password</a></li>
			</ul>
		  </li>
		</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div style="margin-top: 70px;" class="row">
		<div class="container">
			<div class="col-xs-8 col-md-8 ">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Register</h3>
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
							<legend>Register</legend>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="name">Name</label>  
							  <div class="col-md-4">
							  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-xlarge" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="username">Username</label>  
							  <div class="col-md-4">
							  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-xlarge" required="">
							    
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="password">Password</label>
							  <div class="col-md-4">
							    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-xlarge" required="">
							    
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="password_again">Password Again</label>
							  <div class="col-md-4">
							    <input id="password_again" name="password_again" type="password" placeholder="Password Again" class="form-control input-xlarge" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="email">Email Address</label>  
							  <div class="col-md-4">
							  <input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-xlarge" required="">
							  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							  </div>
							</div>

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="register"></label>
							  <div class="col-md-4">
							    <button id="register" name="register" class="btn btn-success btn-xlarge">Register</button>
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
					<h3 class="panel-title">Already have a account?</h3>
				  </div>
				  <div class="panel-body">
						<div class="well" style="text-align: center;">
							Have you already got an account? <a href="login">Login Here</a>
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