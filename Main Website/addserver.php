<?php

include_once 'core/init.php';

$user = new User;

if(!$user->isLoggedIn()){
	Redirect::to(404);
}

setHeader('Add Server');
$db = DB::getInstance();

?>

<?php
if(Input::exists()) {
		$validate   = new Validate();
		$validation = $validate->check($_POST, array(
			'servername' => array(
				'display_name' => 'Server Name',
				'required' => true
			),
			'ip' => array(
				'display_name' => 'Server IP',
				'required' => true,
				'unique' => 'servers'
			),
			'port' => array(
				'display_name' => 'Server Port',
				'required' => true
			),
			'serverwebsite' => array(
				'display_name' => 'Server Website',
				'required' => true
			)
		));
		if($validation->passed()){
			
			$server = new Server;
			$user = new User;

			try {

				$server->create(array(
					'name' => Input::get('servername'),
					'ip' => Input::get('ip'),
					'port' => Input::get('port'),
					'id_owner' => escape($user->data()->id),
					'website' => Input::get('serverwebsite')
				));

				Redirect::to('index');

			} catch(Exception $e) {
				die($e->getMessage());
			}
		}else{
			$errors = $validation->errors();
			$failed = true;
		}
	}

	$serversAdded = number_format($db->query('SELECT * FROM servers WHERE id_owner = ?', array(escape($user->data()->id)))->count(),0);
?>

  <body>
<?php setNavigation('addserver');?>
    <div style="margin-top: 70px;" class="container">
      <div class="well">
      	<?php if($serversAdded < 5): ?>
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
			<legend>Add Server (<?php
			$totalserversleft = 5 - $serversAdded;
		 	if($serversAdded == 0)
		 		echo "Available To Add 5 More Servers!"; 
			else
				echo "Available To Add " . $totalserversleft . " More Servers!"; 
			 ?>)</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="servername">Server Name </label>  
			  <div class="col-md-4">
			  <input id="servername" name="servername" type="text" placeholder="Server Name" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="ip">Server IP</label>  
			  <div class="col-md-4">
			  <input id="ip" name="ip" type="text" placeholder="Server IP" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="port">Server Port</label>  
			  <div class="col-md-4">
			  <input id="port" name="port" type="text" placeholder="Server Port" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="serverwebsite">Server Website</label>  
			  <div class="col-md-4">
			  <input id="serverwebsite" name="serverwebsite" type="text" placeholder="Server Website" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-4">
			    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
			  </div>
			</div>

			</fieldset>
			</form>
		<?php elseif ($serversAdded >= 5): ?>
			Total Servers Reached! (5)
		<?php endif; ?>
      </div>

    </div><!-- /.container -->
	
<?php
setFooter();
?>
  </body>
</html>