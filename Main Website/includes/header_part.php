<?php
  function setHeader($title = 'No Title set', $folderpos = ''){
	     echo   '<!DOCTYPE html>',
				'<html lang="en">',
				'<head>',
				'<title>' . $title .' - MineAlert</title>',
				'</head>',
				'<meta charset="utf-8">',
				'<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">',
				'<meta name="description" content="">',
				'<meta name="author" content="Will M, Jack C">',
				'<link rel="shortcut icon" href="' , $folderpos,'assets/img/favicon.ico">',
				'<link href="'. $folderpos . 'assets/css/bootstrap.css" rel="stylesheet">',
				'<link href="' . $folderpos . 'assets/css/fontawesome.css" rel="stylesheet">',
				'<link href="' . $folderpos . 'assets/css/bootstrap.icon-large.min.css" rel="stylesheet">',
				'<style>body{background-image: url(' . $folderpos . 'assets/img/background.png);background-repeat: no-repeat;background-position: top left;background-attachment: fixed;}</style>';
  }
