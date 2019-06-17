<h1 class="header">YOUR DATA</h1>
<div class="linkbox">
<?php	


	//Gets computer_sn from the computers table. emei, model, unit_sn from the units table. sub_number from the subscriptions table,
	// usim and puk_password from sub_number and adds all of them to a array.
	$computers_temp = $this->employeeData[0]->fetchAll(PDO::FETCH_ASSOC);
	$units_temp = $this->employeeData[1]->fetchAll(PDO::FETCH_ASSOC);
	$subs_temp = $this->employeeData[2]->fetchAll(PDO::FETCH_ASSOC);
	$usim_temp = $this->employeeData[3]->fetchAll(PDO::FETCH_ASSOC);
	$pccount = 0;
        $unitcount = 0;
        $subcount = 0;
        $usimcount = 0;
	echo "<h4 class='headline'># of COMPUTERS owned: " . sizeof($computers_temp) . "</h4><br/>";
        echo "<i class='header'>Serial Numbers:</i>";
        echo "<table>";
	foreach($computers_temp as $computers){
                $pccount++;
		echo "<tr><td><li><h4 class='data'>Computer #". $pccount .":</h4></li></td><td><h4 class='data'> " . $computers['computer_sn'] . "</h4></td></tr>";  
        }
        echo "</table>";
        echo "<div class='feedseperator'></div>";
        echo "<h4 class='headline'># of UNITS owned: " . sizeof($units_temp) . "</h4><br/>";
	foreach($units_temp as $units){
                $unitcount++;
		echo "Unit #". $unitcount ." S/N: " . $units['unit_sn'] . "<br/>";
		echo "EMEI: " . $units['emei'] . "<br/>";
		echo "Model: " . $units['model'] . "<br/>";          
	}
        echo "<div class='feedseperator'></div>";
        echo "<h4 class='headline'># of SUBSCRIPTIONS owned: " . sizeof($subs_temp) . "</h4><br/>";
	foreach($subs_temp as $subs){
                $subcount++;
		echo "Subcription #". $subcount ." Number: " . $subs['sub_number'] . "<br/>";       
	}
        echo "<div class='feedseperator'></div>";
        echo "<h4 class='headline'># of SIMCARDS owned: " . sizeof($usim_temp) . "</h4><br/>";
	foreach($usim_temp as $usim){
                $usimcount++;
		echo "USIM #". $usimcount .": " . $usim['usim'] . "<br/>";
		echo "PUK: " . $usim['puk_password'] . "<br/>";                
	}
?>
</div>