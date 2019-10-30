<?php
/*
** Start session here for all pages
*/
session_start();
/*
** Global Config: 
** Stores everything that can be modifed
*/

if(isset($_SESSION['access'])) {
	if(!($_SESSION['access'] === "Yes")) die();
}else{
	die("Still under development!");
}

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'minealer_admin',
		'password' => 'k4F6cZgw[yR.XK,3_',
		'db' => 'minealer_main'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800

	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

/*
** Using PHP's Standard PHP Library function we are requiring all the classes necessary
*/

spl_autoload_register(function($class){
	require_once './classes/' . $class . '.php';
});

/*
** Other Includes
*/
include_once './includes/header_part.php';
include_once './includes/footer.php';
include_once './includes/nav.php';
include_once './functions/toarray.php';
include_once './functions/escape.php';
/*
** For updating the IP of the logged in user 
*/

$user2 = new User;

if($user2->isLoggedIn()){
	$user2->update($user2->data()->id, array(
		'current_ip' => $_SERVER['REMOTE_ADDR']
	));	
}

/*
** This is for signing the user in if a cookie exists
*/

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash      = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_sessions', array('hash', '=', $hash));

	if($hashCheck->count()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}
