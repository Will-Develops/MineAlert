<?php
	include_once 'init.php';
	include_once 'MinecraftQuery.class.php';

	$db = DB::getInstance();
	$dbStatement = $db->query("SELECT * FROM servers");

	$results = $dbStatement->results();

	foreach($results as $servers) {
		
		$serverid = escape($servers['id']);
		$serverip = escape($servers['ip']);
		$serverport = escape($servers['port']);
		$serveridowner = escape($servers['id_owner']);

		$Timer = MicroTime( true );
		$Query = new MinecraftQuery;

		try{
			$Query->Connect($serverip, $serverport, 1);
			$getInfo = $Query->GetInfo();
			$db->query("INSERT INTO servers_querys (`server_id`, `status`, `players`, `timestamp`) VALUES (?,?,?,?)", array($serverid,"Online",$getInfo['Players'],time()));
		} catch( MinecraftQueryException $e ) {
			$userInfo = $db->query("SELECT * FROM users WHERE id = ?", array($serveridowner));
			
			$userInfoResults = $userInfo->results();

			foreach($userInfoResults as $userResults){

				$serverAdminEmail = escape($userResults['email']);
				$serverAdminName = escape($userResults['name']);

				$to = $serverAdminEmail;

				$subject = "MineAlert - Server Down!";

				$headers = "From: Alerts@MineAlert.net\r\n";
				$headers .= "Reply-To: Alerts@MineAlert.net\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$message = "<html><body>";
				$message .= "<center><img src='https://minealert.net/assets/img/Placeholder.jpg'/></center>";
				$message .= "<p>Hello " . $serverAdminName . ", Your server seems to be down! This could be because it has crashed or you have stopped it</p>";
				$message .= "<p>IP: " . $serverip ."</p>";
				$message .= "<p>Port: " . $serverport ."</p>";
				$message .= "<p>Reason: Unknown</p>";
				$message .= "<br><p>This email has been generated and sent to you by <a href='https://minealert.net'>https://minealert.net</a></p>";
				$message .= "</body></html>";

				mail($to, $subject, $message, $headers);

	            $db->query("INSERT INTO servers_querys (`server_id`, `status`, `players`, `timestamp`) VALUES (?,?,?,?)", array($serverid,"Offline","0",time()));
			}

		}

		$Timer = Number_Format( MicroTime( true ) - $Timer, 4, ".", "" );


	}

	
?>