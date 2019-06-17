<?php
session_start();
$title = isset($_SESSION['title']) ? $_SESSION['title'] : 'IUM Intranet';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL_DK ?>public/css/main.css" />
    </head>
    <body>
<div class="content">
    <div id="menu-box">
	<img src="<?php echo URL_DK ?>public/intranetimages/IUM_intraweb_design_ver.01_02.png" style="padding-top: 42px; padding-bottom: 40px;"/>
	<!-- Creates the menu table  -->
        <table id="menu-table">
    	<tr><td class="menu" style="font-size: 8pt;">Welcome, <?php echo ltrim(str_replace(".", " ", $_SESSION['user']), "ipgemea\\") ?></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Messageboard" class="menu" target="_self">MESSAGEBOARD</a><br/></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Employeelist" class="menu" target="_self">EMPLOYEE LIST</a><br/></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Frontbox" class="menu" target="_self">FRONTBOX</a><br/></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Mediawatch" class="menu" target="_self">MEDIA WATCH</a><br/></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Gallery" class="menu" target="_self">GALLERY</a><br/></td></tr>
        <tr><td class="menu"><a href="<?php echo URL_DK ?>Mydata/getEmployeeData/<?php echo ltrim($_SESSION['user'], "ipgemea\\") ?>" class="menu" target="_self">MY DATA</a><br/></td></tr>
	</table>
       <a href="logout"><img id="logout" src="<?php echo URL_DK ?>public/intranetimages/IUM_intraweb_design_ver.01_05.png" /></a>
       <img src="<?php echo URL_DK ?>public/intranetimages/deco_bar01.png" id="decobar" alt="" style=""/>
</div>
    <!--  Creates the topmenu with links.  -->
    <div id="topmenu">
        <table class="topmenu">
            <tr>
                <td><a href="http://in-countryss.interpublic.com/Nordic/Tickets/AdminTickets.aspx" class="extlinks" title="NBO Ticket System / Helpdesk" target="blank">NBO</a></td>
                <td><a href="http://sps.mbww.com/sites/mbg-emea/nordics/DK/Interne%20Procedurer" class="extlinks" title="Interne Procedurer" target="blank">IP</a></td>
                <td><a href="http://insider.initiative.com/" class="extlinks" title="Insider" target="blank">Insider</a></td>
                <td><a href="http://intranet.ium.dk/tools/Marathon.bat" class="extlinks" title="" target="blank">Marathon</a></td>
                <td><a href="http://snapshot.iumnordic.com/" class="extlinks" title="" target="blank">Snapshot</a></td>
                <td><a href="http://zebra.iumnordic.com/" class="extlinks" title="" target="blank">Zebra</a></td>
                <td><a href="http://extranet.iumnordic.com/" class="extlinks" title="" target="blank">Extranet</a></td>
                <td><a href="https://webcargo.net/ipg" class="extlinks" title="" target="blank">Webcargo</a></td>
                <td><a href="http://intranet.umww.com/limo/" class="extlinks" title="" target="blank">Limo</a></td>
                <td><a href="http://www.mediabrandsww.com/worldmarkets/" class="extlinks" title="Media Brands World Markets" target="blank">MB WM</a></td>
            </tr> 
       </table>
   </div>
    <div id="calendarmaindiv">
        <h2 class="calendarheader">IUM CALENDAR</h2>
        <?php
                $calendar = simplexml_load_file(DK_CALENDAR);
        	foreach($calendar->channel->item as $Item){
		echo "<tr><td><a href=". str_replace(" ", "%20", $Item->link) . " class='frontboxlink' target='_new'>" . 
				utf8_decode($Item->title) . 
				"</a><br/>";
		echo "<div class='posted_by'>".$Item->pubDate . "<br/>";
		echo utf8_decode(substr($Item->description, 0, 16)) . "</div></td></tr>";
                echo "<hr>";
                }
        ?>
    </div>
<div id="contentframe" >

