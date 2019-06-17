<h1 class="header">FRONTBOX</h1>
<h4 class="externallinks">Opens on a new browser tab</h4>
<div class="linkbox">
<?php
		foreach($this->frontbox->channel->item as $Item){
                    echo "<a href='".$Item->link."' class='frontboxlink' target='blank'>".utf8_decode($Item->title)."</a><br/> ";
                    echo "<div class='posted_by'> Published: " . $Item->pubDate . "</div><br/>";
                    echo '<div class="newscontent">'.utf8_decode($Item->description) . '<div><br/>';
                    echo '<div class="feedseperator"></div>';
		}
?>
</div>