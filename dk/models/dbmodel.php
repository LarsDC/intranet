<?php

class DBModel extends Model{
    public function __construct(){
        parent::__construct();   
    }
    
    
	//show a specific employees profile
	public function showEmployee($username){
	
	$stmt = $this->db->prepare("SELECT employee_name, title, description, picture from employees
							where logon_name = '" . $username . "'");
	$stmt->execute();
        $query = $stmt->fetchAll();
	$this->db = null;
	return $query;
	}
	
	//Gets computer_sn from the computers table. emei, model, unit_sn from the units table. sub_number from the subscriptions table,
	// usim and puk_password from sub_number and adds all of them to a array.
	public function getEmployeeData($username){
	
            
	$query_computers = $this->db->prepare("select computer_sn from computers where logon_name ='" .$username."'");
	$query_computers->execute();
	
	$query_units = $this->db->prepare("select emei, model, unit_sn from units where logon_name =  '" . $username . "'");
	$query_units->execute();
	
	$query_subscriptions = $this->db->prepare("select sub_number from subscriptions where logon_name =  '" . $username . "'");
	$query_subscriptions->execute();
        
	$sub_number = $query_subscriptions->fetch(PDO::FETCH_ASSOC);
	
	$query_usim = $this->db->prepare("select usim, puk_password from usim where sub_number =  " . $sub_number['sub_number']);
	$query_usim->execute();
		
	$array = array($query_computers, $query_units, $query_subscriptions, $query_usim);

	$this->db = null;
	return $array;
	}
	
        	//get employee list with name and department from the database.
	public function employeeList(){
	//Query the db
	$stmt = $this->db->prepare("SELECT * from employees 
            order by employees.employee_name asc");
	// ,employees.department asc;			
        $stmt->execute();
        $query = $stmt->fetchAll();
        //Close the db connection - IMPORTANT!
	$this->db = null;
	
	return $query;
	}
        
	//show the message board.
	public function messageBoardPosts(){	
            
	$stmt = $this->db->prepare("SELECT * from new_posts 
            order by new_posts.post_date desc;");
	
	//$stmt2 = $this->db->prepare("SELECT * from new_comments order by new_comments.comment_date asc;");
	//$array = array($stmt->execute(), $stmt2->execute());
	$stmt->execute();
        $query = $stmt->fetchAll();
        
	$db = null;
	return $query;
	}
        
        public function messageBoardComments(){	
            
	//$stmt = $this->db->prepare("SELECT * from new_posts order by new_posts.post_date desc;");
	
	$stmt = $this->db->prepare("SELECT * from new_comments order by new_comments.comment_date asc;");
	
	$stmt->execute();
	$query = $stmt->fetchAll();
	$this->db = null;
	return $query;
	}
	
	//create a post on the message board.
	public function createPost($username, $postText, $postTitle){
	$user = ltrim($username, "ipgemea\\");
	
	$stmt = $this->db->prepare("insert into new_posts (logon_name, description, title, post_date) 
							values ('" . $user . "', '" . $postText . "', '" . $postTitle . "', NOW());");
        $stmt->execute();
	$db = null;
	
	}

	//create a comment related to a specific post on the message board.
	public function postComment($comment, $post_id, $username){
            
	$user = ltrim($username, "ipgemea\\");
	$stmt = $this->db->prepare("insert into new_comments (description, logon_name, post_id, comment_date) 
							values ( '" . $comment . "', '" . $user . "', " . $post_id . ", NOW());");
	$stmt->execute();
	$db = null;
	}
	
	//Update user profile description.
	public function setEmployeeProfile($description, $username){
	if($description != ""){
		$stmt = $this->db->query("update employees set description ='" . $description . "' where logon_name ='" . $username . "';");
                $stmt->execute();
	}
	$db = null;
	}
	
	//Uploads and saves a picture with the employees logon_name.
	function savePicture($user){	
            //echo $_FILES["file"]["name"];
                    $allowedExts = array("jpg", "jpeg", "gif", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);
                    if ((($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/pjpeg"))
                    && ($_FILES["file"]["size"] < 2000000)
                    && in_array($extension, $allowedExts))
                      {
                              move_uploaded_file($_FILES["file"]["tmp_name"],
                              "C:\\xampp\\htdocs\\dk\\public\\uploads\\" . $user . "." . $extension );                            
                              $this->savePicturePath(URL_DK . "public/uploads/" . $user. "." . $extension , $user);
                      }
                    else
                      {
                            echo "Invalid file";
                            
                      }
                      //return "" . $_FILES["file"]["name"];
	}
	
	//Saves the picturepath to do DB
	function savePicturePath($picture_path, $user){
            session_start();
            $_SESSION['picturepath'] = $picture_path;
		if($picture_path != ""){
			$stmt = $this->db->prepare("update employees set picture ='". $picture_path ."' where logon_name ='" . $user . "';");
                        $stmt->execute();
		}
		$db = null;
		
	}
	
}