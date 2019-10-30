<?php
/*
** Global Config: 
** Stores everything that can be modifed
*/

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'minealer_admin',
		'password' => 'k4F6cZgw[yR.XK,3_',
		'db' => 'minealer_main'
	)
);

/*
** Using PHP's Standard PHP Library function we are requiring all the classes necessary
*/

spl_autoload_register(function($class){
	require_once '../classes/' . $class . '.php';
});

/*
** Other Includes
*/
include_once '../includes/header_part.php';
include_once '../includes/footer.php';
include_once '../includes/nav.php';
include_once '../functions/toarray.php';
include_once '../functions/escape.php';