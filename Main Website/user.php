<?php
/*
** Including core initialization file
*/
require_once 'core/init.php';


$db = DB::getInstance();

if(isset($_GET['code']))
{
	if(!$_GET['code'] == 927456) 
		Redirect::to(404);
}
else
	Redirect::to(404);

if(isset($_GET['username']))
{
		$name = $_GET['username'];
		$user = new User($name);

    if(!$user->exists())
			Redirect::to(404);
}
else
	Redirect::to(404);	

setHeader(escape($user->data()->username) . "'s Profile",'../');

?>

  <body>

    <?php setNavigation('user','../'); ?>

    <div style="margin-top: 70px;" class="container">

		<div class="col-xs-12 col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 style="text-align: center;" class="panel-title">User Profile</h3>
			  </div>
			  <div class="panel-body">
					<div class="well">
						<div class="row"> 
							<div class="col-xs-4 col-md-4 col-sm-4" style="text-align: center;">
								<span class="mc-skin" data-minecraft-username="<?php echo escape($user->data()->username); ?>"></span>
							</div>
							
							<div class="col-xs-8 col-md-8 col-sm-4">
                            			<?php 
	                            			echo '<h1>' . escape($user->data()->username) . '</h1>',
				                                 ($user->data()->verified == 1)       ? '</h1><span class="label label-primary" style="margin-right:5px;">Verified</span>' : '', 
				                                 ($user->hasPermission('founder'))    ? '</h1><span class="label label-success" style="margin-right:5px;">Founder</span>' : '', 
				                                 ($user->hasPermission('co-founder')) ? '</h1><span class="label label-success" style="margin-right:5px;">Co-Founder</span>' : '', 
				                                 ($user->hasPermission('developer'))  ? '</h1><span class="label label-warning" style="margin-right:5px;"><i class="fa fa-code"></i> Developer</span>' : '', 
				                                 ($user->hasPermission('premium'))    ? '</h1><span class="label label-info" style="margin-right:5px;">Premium</span>' : '',
				                                 ($user->hasPermission('support'))    ? '</h1><span class="label label-warning" style="margin-right:5px;">Support Agent</span>' : '', 
				                                 ($user->hasPermission('default'))    ? '</h1><span class="label label-warning" style="margin-right:5px;">Default</span><br><br>' : '',
				                                 ($user->hasPermission('betatester')) ? '</h1><span class="label label-info" style="margin-right:5px;"><i class="fa fa-star"></i> Beta Tester</span><br><br>' : '';
										?>
								<ul class="nav nav-tabs">
								  <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
								  <li><a href="#servers" data-toggle="tab">Servers</a></li>
								  <?php echo ($user->isLoggedIn()) ? '<div class="tab-pane fade" id="settings">Settings</div>' : ''; ?>
								</ul>
								<div class="tab-content">
								  <div class="tab-pane active" id="profile">
									<table class="table table-striped table-hover">
									<tr>
									  <td>Name</td>
									  <td><?php echo escape($user->data()->name); ?></td>
									</tr>
									<tr>
									  <td>Servers Added</td>
									  <td>
									  	<?php echo $db->query("SELECT * FROM servers WHERE id_owner = ?", [$user->data()->id])->count(); ?>
									  </td>
									</tr>
									<tr>
									  <td>Verified</td>
									  <td><?php echo($user->hasPermission('verified')) ? '<span class="label label-success" style="margin-right:5px;">True</span>' : '<span class="label label-danger" style="margin-right:5px;">False</span>';?></td>
									</tr>
									<tr>
									  <td>Date Joined</td>
									  <td><?php echo escape($user->data()->joined);?></td>
									</tr>
									</table>
								  </div>
								  <div class="tab-pane fade" id="servers">
								   		<?php 
								   			$dbStatement = $db->query("SELECT * FROM servers WHERE id_owner = ?", [$user->data()->id]);
									   	?>
									   	<?php if($dbStatement->count() === 0): ?>
											<div class="alert alert-dismissable alert-warning">
											<h4>Warning!</h4>
											<p>No Servers Added!</p>
											</div>
									   	<?php elseif($dbStatement->count() >= 1): ?>
												<table class="table table-striped" width="100%">
													<tr>
														<th>Name</th>
														<th>IP</th>
														<th>Website</th>
														<th>Status</th>
													</tr>

									   		<?php foreach($dbStatement->results() as $servers): ?>
													<?php
														$queryStatus = $db->query("SELECT * FROM servers_querys WHERE server_id = ? ORDER BY id DESC LIMIT 1", array(escape($servers['id']))); 
														$queryResult = $queryStatus->first();
														$serverStatus = $queryResult->status;
														$serverTimestamp = $queryResult->timestamp;
													?>
													<?php if($serverStatus == "Online"): ?>
														<tr class="success">
													<?php else: ?>
														<tr class="danger">
													<?php endif; ?>
														<td><?php echo escape($servers['name']); ?></td>
														<?php if($servers['port'] == 25565): ?>
															<td><?php echo escape($servers['ip']); ?></td>
														<?php else: ?>
															<td><?php echo escape($servers['ip'] . ':' . $servers['port']); ?></td>
														<?php endif; ?>

														<?php if($servers['website'] != null): ?>
															<td><a href="<?php echo escape($servers['website']); ?>" target="_blank"><?php echo escape($servers['website']);?></a></td>
														<?php else: ?>
															<td>No Website Link Added!</td>
														<?php endif; ?>

														<?php if($serverStatus == "Online"): ?>
															<td><i data-toggle="tooltip" title="Last Check: <span data-livestamp='<?php echo $serverTimestamp; ?>'></span>" class="fa fa-2x fa-check-square"></td>
														<?php else: ?>
															<td><i data-toggle="tooltip" title="Last Check: <span data-livestamp='<?php echo $serverTimestamp; ?>'></span>" class="fa fa-2x fa-times"></td>
														<?php endif; ?>

													</tr>
											<?php endforeach; ?>
											</table>
										<?php endif; ?>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div><!-- /.container -->
	
<?php
	setFooter('../');
?>
	<script type="text/javascript">
		$(function() {
			$(".mc-skin").minecraftSkin();
		});
	    $(function(){
	       $('[rel="tooltip"]').tooltip();
	    });
	    $('i[data-toggle="tooltip"]').tooltip({
		    animated: 'fade',
		    placement: 'bottom',
		    html: 'true',
		});
	</script>
	<style>
		.scratch {
		    display:none;
		}
	</style>
	</body>
</html>