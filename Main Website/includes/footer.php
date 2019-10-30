<?php
  function setFooter($folderpos = ''){
echo	'<footer>
			<div class="container">
				<div class="well" style="padding:10px;">
					<ul class="nav nav-pills pull-left" style="cursor: default;">
						<li class="disabled" style="cursor: default;"><a style="color: black;cursor: default;">&copy MineAlert 2014 - ' . date("Y") . '</a></li>
						<li class="disabled" style="cursor: default;"><a style="color: black;cursor: default;">This website is not affiliated with Mojang.com or Minecraft.net.</a></li>
					</ul>
					<ul class="nav nav-pills pull-right" style="cursor: default;">
						<li><a href="https://twitter.com/MineAlert" target="_blank" style="cursor: default;"><i class="fa fa-twitter"></i> Twitter</a></li>
						<li><a href="https://www.facebook.com/MineAlert" target="_blank" style="cursor: default;"><i class="fa fa-facebook"></i> Facebook</a></li>						
						<li><a href="' . $folderpos . 'team" style="cursor: default;">Jack C & Will M <i class="fa fa-code"></i></a></li>
					</ul><br>
					<div class="clearfix"></div>
				</div>
			</div>
		<footer>';
	
	echo '<script src="' . $folderpos . 'assets/js/jquery.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/signup.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/signin.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/bootstrap.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/jquery.jigowatt.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/livestamp.js"></script>',
	     '<script src="' . $folderpos . 'assets/js/moment.js"></script>',
		 '<script src="' . $folderpos . 'assets/js/jquery.minecraftskin.js"></script>';
}