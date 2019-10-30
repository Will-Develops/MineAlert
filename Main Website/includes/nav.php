<?php

function setNavigation($active,$folderlocation = ''){
$user = new User;
echo '	    <div class="navbar navbar-default navbar-fixed-top">';
echo '      <div class="container">';
echo '        <div class="navbar-header">';
echo'          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">';
echo'            <span class="icon-bar"></span>';
echo'            <span class="icon-bar"></span>';
echo'            <span class="icon-bar"></span>';
echo'          </button>';
echo'          <a class="navbar-brand" href="#">MineAlert</a>';
echo'        </div>';
echo'        <div class="collapse navbar-collapse">';
echo'          <ul class="nav navbar-nav">';
echo'            ',($active === 'index') ? '<li class="active">' : '<li>','<a href="'.$folderlocation.'index">Home</a></li>';
echo'			 ',($active === 'team') ? '<li class="active">' : '<li>','<a href="'.$folderlocation.'team">MineAlert Team</a></li>';
echo'          </ul>';
echo'		<ul class="nav navbar-nav navbar-right">';
if($user->isLoggedIn()){
echo'		  <li class="dropdown">';
echo'			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> ',escape($user->data()->username),' <b class="caret"></b></a>';
echo'			<ul class="dropdown-menu">';
echo'						<li><a href="'.$folderlocation.'profile/',escape($user->data()->id),'">Your Profile</a></li>';
echo'						<li><a href="'.$folderlocation.'addserver">Add Server</a></li>';
echo'						<li class="divider"></li>';
echo'						<li><a href="'.$folderlocation.'logout">Log Out</a></li>';
echo'			</ul>';
echo'		  </li>';
echo'		</ul>';
echo'        </div><!--/.nav-collapse -->';
echo'      </div>';
echo'    </div>';
}else{
echo'		  <li class="dropdown">';
echo'			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>';
echo'			<ul class="dropdown-menu">';
echo'			  ',($active === 'login') ? '<li class="active">' : '<li>','<a href="'.$folderlocation.'login"><i class="fa fa-sign-in"></i> Login</a></li>';
echo'			  ',($active === 'register') ? '<li class="active">' : '<li>','<a href="'.$folderlocation.'register"><i class="fa fa-edit"></i> Register</a></li>';
echo'			  ',($active === 'passforgot') ? '<li class="active">' : '<li>','<a href="'.$folderlocation.'passforgot"> Forgot Password</a></li>';
echo'			</ul>';
echo'		  </li>';
echo'		</ul>';
echo'        </div><!--/.nav-collapse -->';
echo'      </div>';
echo'    </div>';	
}
}