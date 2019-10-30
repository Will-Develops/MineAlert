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
setHeader('Contact Us');
?>

  <body>

    <?php setNavigation('contact'); ?>

    <div style="margin-top: 70px;" class="row">
		<div class="container">
		
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
					Contact Us
					</h3>
				</div>
				<div class="panel-body">
					<div id="message"></div>
					
					<form class="form-horizontal" method="post" action="contactscript.php" name="contactform" id="contactform">
					  <fieldset>
						<div class="form-group">
						  <label for="inputEmail" class="col-lg-2 control-label">Name *</label>
						  <div class="col-lg-10">
							<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputEmail" class="col-lg-2 control-label">Email *</label>
						  <div class="col-lg-10">
							<input name="email" type="text" class="form-control" id="email" placeholder="Email Address">
						  </div>
						</div>
						<div class="form-group">
						  <label for="subject" class="col-lg-2 control-label">Subject *</label>
						  <div class="col-lg-10">
							<select class="form-control" name="subject" id="subject">
							  <option value=""></option>
							  <option value="Support">Support</option>
							  <option value="Report A Bug">Report A Bug</option>
							</select>
						  </div>
						</div>
						<div class="form-group">
						  <label for="textArea" class="col-lg-2 control-label">Comments *</label>
						  <div class="col-lg-10">
							<textarea style="max-width:100%;min-width:100%;" class="form-control" rows="3" name="comments" id="comments"></textarea>
						  </div>
						</div>
						<input name="verify" type="text" id="verify" size="4" value="4" style="width: 30px;" />
						<div class="form-group">
						  <div class="col-lg-10 col-lg-offset-2">
							<button type="submit" data-loading-text="Loading..." id="submit" name="submit" class="btn btn-primary">Submit</button>
						  </div>
						</div>
					  </fieldset>
					</form>
				</div>
			</div>
		</div> <!--./row -->
	</div> <!--./container -->
	
<?php
setFooter();
?>
  </body>
</html>