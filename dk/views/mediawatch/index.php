<h1 class="header">MEDIAWATCH</h1>
<h4 class="externallinks">Opens on a new browser tab</h4>
<div class="linkbox">
    <?php
    
    		foreach($this->mediawatch->channel->item as $Item){
                    echo "<div class='feedseperator'></div>";
                    echo "<a href='".$Item->link."' class='frontboxlink' target='blank'>".utf8_decode($Item->title)."</a><br/> ";
                    echo "<div class='posted_by'>Published: " . $Item->pubDate . "</div><br/>";
                    echo "<a href='".$Item->comments."' class='frontboxlink' target='blank'>View comments for this article!</a><br/> ";

		}   
    ?>
</div>
