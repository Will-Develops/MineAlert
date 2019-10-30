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
$user = new User;
$user->isLoggedIn();
setHeader('Home');
$db = DB::getInstance();
?>

  <body>
<?php setNavigation('index');?>
    <div style="margin-top: 70px;" class="container">
      <div class="well">
        <h2>MineAlert</h2>
        <p class="lead">MineAlert is a service that will email you when your server is offline; this could be due to Network issues on your end or a server crash - MineAlert will notify you if this were to happen.</p>
		<p class="lead">Please check our social media pages below for more updates!</p>
		<p class="lead">Thanks, Jack C & Will M</p>
		<p class="lead">MineAlert Team</p>
      </div>
	  
		<div style="text-align: center;" class="row">
		  <div class="col-lg-3">
			<div class="well">
			  <h3>Total Users</h3>
			  <h4><?php echo number_format($db->query('SELECT * FROM users')->count(),0);?></h4>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="well">
			  <h3>Emails Sent</h3>
			  <h4><?php echo number_format($db->query('SELECT * FROM servers_querys WHERE status = "Offline"')->count(),0);?></h4>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="well">
			  <h3>Total Servers</h3>
			  <h4><?php echo number_format($db->query('SELECT * FROM servers')->count(),0);?></h4>
			</div>
		  </div>
		  <div class="col-lg-3">
			<div class="well">
			  <h3>Total Queries</h3>
			  <h4><?php echo number_format($db->query('SELECT * FROM servers_querys')->count(),0);?></h4>
			</div>
		  </div>
		</div>

    </div><!-- /.container -->
	
<?php
setFooter();
?>
  </body>
</html>