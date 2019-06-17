<h1 class="header">MESSAGEBOARD</h1>
<div id="posts_header">POSTS:</div>
<div id="messageboard">
       <div id="posts_block">
        <?php
        if($this->messageBoardPosts != NULL){
        	foreach($this->messageBoardPosts as $post){
                    echo "<h3>" . strtoupper($post['title']) . "</h3>";
                    echo "<div class='posted_by'>Posted by: " . $post['logon_name'] . " on " . $post['post_date'] . "</div>";
                    echo "<div id='post'>".$post['description']."</div>";
                    echo '<div id="comments_for_post_bar">COMMENTS FOR THIS POST:</div>';
                    
                    //Print out comments for the current post in ascending order.
                    foreach($this->messageBoardComments as $comment){
                            if($comment['post_id'] == $post['post_id']){
                                    echo '<div class="posted_by">Commented by: <a href="Showemployeeprofile/index/'. $comment["logon_name"] 
                                            .'" target="_self">'. $comment["logon_name"] . '</a> on ' . $comment["comment_date"].'</div>';
                                    echo "<div id='comment'>".$comment['description']."</div>"; 
                                    echo '<br/>';
                            }
                    }
                    echo '<form id="myform" action="saveComment" method="post" name="postComment">';
                    //echo '<textarea class="description" style="overflow: hidden; height: 20px;"></textarea>
                    echo'   <input type="text" id="commentText" name="commentText">
                            <input type="hidden" id="postId" name="postId" value="'. $post['post_id'] .'"/>
                            </form><br/><br/>';
                    echo '<div class="post_seperater"></div>';
                }
        } else {
            echo '<h3>No content found! </h3>';
        }
        ?>
       </div>
    <div id="new_post_block">
       <img src="public/intranetimages/post_new_12.png" />
       <table id="new_post_table">
       <form action="savePost" id="createPost" name="createPostForm" method="post">
           <tr><td>Enter Title</td></tr>
           <tr><td><input type="text" class="text" id="postTitle" name="postTitle" /></td></tr>
           <tr><td><textarea class="postTextArea" id="postText" name="postText" cols='20' rows='5' ></textarea></td></tr>
       </table>
       <div id="submit_bg">
           <div id="submit_post">
               <input type='image' src="public/intranetimages/submit_post_09.png" align="right" title="SUBMIT!" name="submit_image" value='SUBMIT' />
           </div>
            <!--<input type='hidden' name='user' id='user' /> -->
       </div>
       
       </form>
    </div>
    
</div>
<?php	
	//Extract data from PDO object as arrays
	//$commentsTemp = $this->messageBoard[1]->fetchAll(PDO::FETCH_OBJ);
	//$postsTemp = $this->messageBoard[0]->fetchAll(PDO::FETCH_OBJ);

	//Create a form to create a new post. Sends the data to create_post.php
	/*echo "Create a new Post: ";
		echo '<form action="application/create_post.php" name="create_post" method="post">';
		echo "Enter Title:<br/>";
		echo "<input type='text' name = 'title' id='title'/><br/>";
		echo "<textarea  name='post_text' cols='45' rows='5'></textarea><br/>";
		echo "<input type='submit' value='SUBMIT' />";
		echo "<input type='hidden' name='user' id='user' value=" . $_SESSION['user'] . " />";
		echo "</form>";
		echo "<hr><br/>";
	*/
return false;
	//Print out the posts in descending order. Newest first for the n00bs
	foreach($this->messageBoardPosts as $post){
		echo "<h3>" . $post['title'] . "</h3><br/>";
		echo "<p>Posted by: " . $post['logon_name'] . " on " . $post['post_date'] . "</p><br/>";
		echo "<p>" . $post['description'] . "</p><br/>";
		echo "Comments for this post: <br/>";
		//Print out comments for the current post in ascending order.
		foreach($this->messageBoardComments as $comment){
			if($comment['post_id'] == $post['post_id']){
				echo "Commented by: " . $comment['logon_name'] . " on " . $comment['comment_date'];
				echo "<br/>"; 
				echo $comment['description']; 
				echo "<br/><br/>";
				}
		
		}
                return false;
		//Creates a form to post a comment to the attached post.
		echo "Post a comment: ";
		echo '<form action="application/post_comment.php" name="post_comment" method="post">';
		echo "<textarea  name='comment_text' cols='45' rows='5'></textarea><br/>";
		echo "<input type='submit' value='SUBMIT' />";
		echo "<input type='hidden' name='post_id' id='post_id' value=" . $post['post_id'] . " />";
		echo "</form>";
		echo "<hr><br/>";
	}
	
?>
