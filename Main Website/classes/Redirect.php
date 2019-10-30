<?php
class Redirect{
	public static function to($location = null){
			if($location){
				if(is_numeric($location)) {
					switch($location){
						case 404:
							header('Location: ./home/minealer/public_html/site/404');
							exit();
						break;
				    }
				}
				header('Location: ' . $location);
				exit();
		}

	}
}