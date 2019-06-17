<?php
	save_feeds_xml('http://sps.mbww.com/sites/mbg-emea/nordics/DK/list.rss?feed=IUM%20Calendar', 'calendar.xml');
	save_feeds_xml('http://sps.mbww.com/sites/mbg-emea/nordics/DK/list.rss?feed=Opslagstavle', 'noticeBoard.xml');
	save_feeds_xml('http://sps.mbww.com/sites/mbg-emea/nordics/DK/list.rss?feed=Announcements', 'announcements.xml');
	saveXMLFile('http://mediawatch.dk/rss.xml', 'mediawatch.xml');
	
	
	function save_feeds_xml($url_in, $file_name){
		//Settings
		$url = $url_in;
		$user = "ipgemea\\intranet.service";
		$pass = "1nterpublicIU";
		 
		//Open file to be written to
		$temp_file = $file_name;
		$fp = fopen($temp_file, 'w');
		 
		//Initialize a cURL session
		$curl = curl_init();
		 
		//Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		 
		//The URL to fetch
		curl_setopt($curl, CURLOPT_URL, $url);
		 
		//Force HTTP version 1.1
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		 
		//Use NTLM for HTTP authentication
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
		 
		//Username/password to use for the connection
		curl_setopt($curl, CURLOPT_USERPWD, $user . ':' . $pass);
		 
		//Stop cURL from verifying the peer's certification
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		 
		//Execute cURL session
		$result = curl_exec($curl);
		 
		//Close cURL session
		curl_close($curl);
		 
		fwrite($fp, $result);
		fclose($fp);
	}

	function saveXMLFile($url, $file_name){
		$xml = file_get_contents($url);
		$temp_file = $file_name;
		$fp = fopen($temp_file, 'w');
		fwrite($fp, $xml);
		fclose($fp);
	}
	

?>