<?php

class RSSModel extends Model{
    
        public function __construct(){
            parent::__construct();
        }

	//connection to rss feeds
	public function getRSSFeed($url){
	// username and password to use
	$usr = 'ipgemea\intranet.service';
	$pwd = '1nterpublicIU';
	//Initialize a cURL session
	$curl = curl_init();
	//Return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//Set URL to fetch
	curl_setopt($curl, CURLOPT_URL, $url);
	//Force HTTP version 1.1
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	//Use NTLM for HTTP authentication
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
	//Username:password to use for the connection
	curl_setopt($curl, CURLOPT_USERPWD, $usr . ':' . $pwd);
	//Stop cURL from verifying the peer�s certification
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	//Execute cURL session
	$result = curl_exec($curl);
	//Close cURL session
	curl_close($curl);
	
	$xml = simplexml_load_string($result);
	return $xml;
	
	}
	
	//Convert Frontbox feed to html string
	function fetchXML($url, $fileName){
                if(file_exists($fileName)){
                    $xml = simplexml_load_file($fileName);
                } else {
                    $xml = simplexml_load_file($url);
                }
		return $xml;
	}
}