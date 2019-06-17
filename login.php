<?php
session_start();
	$gdcdk='cphgdc02.emea.corp.ipgnetwork.com';
	$gdcse='cphgdc02.emea.corp.ipgnetwork.com';
	$gdcno='cphgdc02.emea.corp.ipgnetwork.com';
	$gdcfi='cphgdc02.emea.corp.ipgnetwork.com';
	$user="ipgemea\\" . $_POST['user'];
	$pass=$_POST['pass'];
	
	//Connect to LDAP server.
	$ds = ldap_connect( $gdcdk );
	ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
	 
	if ($ds) {
		//Using the provided user and password to login into LDAP server.
		//For the dc, normally will be the domain.
				
			$dk=ldap_bind($ds, $user, $pass);
				if($dk){
					$_SESSION['user'] = $_POST['user'];
					$_SESSION['country'] = 'dk';
					header("location:dk/");
					ldap_close($ds);
				}else{
					$_SESSION['error'] = "Error in login";
					header("location:../");
					ldap_close($ds);
				}
			

		}
		
		// }else if($se){
			// $_SESSION['user'] = $user;
			// header("location:tinymvc.php");
		// }else if($no){
			// $_SESSION['user'] = $user;
			// header("location:tinymvc.php");
		// }else if($fi){
					// $_SESSION['user'] = $user;
			// header("location:tinymvc.php");
		// }else{
			// $_SESSION['error'] = "Error in login";
			// header("location:login.php");
		// }
		
 
?>
