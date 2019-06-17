<?php
$user = isset($_SESSION['user']) ? $_SESSION['user'] : 'NONAME';
//echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = 'MSIE';
$pos = strpos($_SERVER['HTTP_USER_AGENT'],$browser);
//$browser = get_browser(null, true);
?>
<div class="content">
	<div id="menu-box">
	<img src="public/intranetimages/IUM_intraweb_design_ver.01_02.png" style="padding-top: 15px; padding-bottom: 40px;"/>
	<table id="menu-table">
    	<tr><td class="menu">Welcome, <?php echo ltrim(str_replace(".", " ", $user), "ipgemea\\") ?></td></tr>
        <tr><td class="menu"><a href="messageBoard" target="contentframe">Messageboard</a><br/></td></tr>
        <tr><td class="menu"><a href="employeeList" target="contentframe">Employee List</a><br/></td></tr>
        <tr><td class="menu"><a href="frontbox" target="contentframe">Frontbox</a><br/></td></tr>
        <tr><td class="menu"><a href="gallery" target="contentframe">Gallery</a><br/></td></tr>
        <tr><td class="menu"><a href="" target="contentframe">My Data</a><br/></td></tr>
	</table>
       <a href="logout"><img id="logout" src="public/intranetimages/IUM_intraweb_design_ver.01_05.png" /></a>
       <img src="public/intranetimages/deco_bar01.png" id="decobar" alt="" style=""/>
    </div>
<!--<iframe src="messageBoard" id="contentframe" name="contentframe" scrolling="no" frameBorder="0" 
<?php 
if($pos === false) {
    // string 'MSIE' NOT found as browser
    echo 'onload="parent.alertsize(document.body.scrollHeight);">';  
}
else {
    //echo 'onload="this.style.height = contentframe.document.body.scrollHeight + 5">';
    echo 'onLoad="setIframeHeight( this.id )">';
}
?>
        </iframe>-->
</div>

