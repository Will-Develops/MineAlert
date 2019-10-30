<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';


$db = DB::getInstance();

if(isset($_GET['username'])){
		$name = $_GET['username'];
		$user = new User($name);

    //if(!$user->exists())
			//Redirect::to(404);
} else
	//Redirect::to(404);	

setHeader("My Servers");

?>

  <body>

    <?php setNavigation('myservers'); ?>

    <div style="margin-top: 70px;" class="container">

		<div class="col-xs-12 col-md-12">

		</div>
  </div><!-- /.container -->
	
<?php
	setFooter();
?>
	</body>
</html>