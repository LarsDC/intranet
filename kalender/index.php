<!DOCTYPE html>
<html>
    <head>
        <script src="movies.js"></script>
    </head>
    <body>
        <div id="theD"></div>
        
        <?php
        $url = 'http://sps.mbww.com/sites/mbg-emea/nordics/DK/list.rss?feed=Test-Calendar#';
        
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
	

                foreach($xml->channel->item as $Item){
		echo "<tr><td><a href=". str_replace(" ", "%20", $Item->link) . " class='frontboxlink' target='_new'>" . 
				utf8_decode($Item->title) . 
				"</a><br/>";
		echo "<div>".$Item->pubDate . "<br/>";
		echo utf8_decode($Item->description) . "</div></td></tr>";
                echo "<hr>";
                }

	
        

        

        ?>
        </body>
</html>
