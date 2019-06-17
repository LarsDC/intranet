<h1 class="header">EMPLOYEE PROFILE</h1>
<div class="linkbox">
<?php
        if(isset($this->employeeData[0])){
            extract($this->employeeData[0]);
		if(isset($picture) != null){
			echo '<img src="' . $picture . '" alt="' . $employee_name . '" height="250" width="150"><br/>';
		}
		echo "Name: " . $employee_name . "<br/>" ;
		echo "Title: " . $title . "<br/>"; 
		echo "Description: " . $description. "<br/>";
		echo "<br />";
        }
	$loggedOnUser = $_SESSION['user'];
	$loggedOnUser = ltrim($loggedOnUser, "ipgemea\\");
	if(strcasecmp($this->reqUser, $loggedOnUser) == 0){
		echo "Update profile: ";
		echo '<form action="'.URL_DK.'setEmployeeProfile" name="setEmployeeProfile" method="post" enctype="multipart/form-data">';
		echo "<textarea id='descriptionText' name='descriptionText' cols='45' rows='5'></textarea><br/>";
		echo '<label for="file">Upload Picture: <input type="file" name="file" id="file" /></label><br/> ';
		echo "<input type='submit' value='SUBMIT' />";
		echo "<input type='hidden' name='user' id='user' value=" . $loggedOnUser . " />";
		echo "</form>";
		echo "<hr><br/>";
	}
?>
</div>