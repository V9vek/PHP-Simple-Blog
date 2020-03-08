<?php include_once 'inlcudes/header.php'; ?>

<?php

	//Create DB Object
	$db = new Database;

	//Checking if form is submitted 
	if (isset($_POST['submit'])) {
	 	
	 $title = mysqli_real_escape_string($db->link, $_POST['title']);
	 $body = mysqli_real_escape_string($db->link, $_POST['body']);
	 $category = mysqli_real_escape_string($db->link, $_POST['category']);
	 $author = mysqli_real_escape_string($db->link, $_POST['author']);
	 $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

	 //Simple validation
	 if (empty($title) || empty($body) || empty($category) || empty($author)) {
	 	//Set Error
	 	$error = "Fill All The Details !";
	 }
	 else{
	 	$query = "INSERT INTO posts 
	 				(title, body, category, author, tags)
	 				VALUES('$title', '$body', '$category', '$author', '$tags' )";
		$insert_row = $db->insert($query);			
	 }
	}

 ?>

<?php 

	//Select query of categories table
	$query = "SELECT * FROM categories";
	$categories = $db->select($query);
 ?>


<!-- form -->
<form method="POST" action="add_post.php">

  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
  </div>

  <div class="form-group">
    <label>Post Body</label>
   	<textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select name="category">
    	<?php while ($row = $categories->fetch_assoc()) : ?>
    		<!-- value attribute in <option> is to set value to category column of post -->
    		<option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
    	<?php endwhile; ?>	
    </select> 
  </div>

  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name">
  </div>

  <div class="form-group">
	  <label>Tags</label>
	  <input type="text" name="tags" class="form-control" placeholder="Enter Tags">
  </div>

  <div class="form-group">	
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class=" btn btn-primary">Cancel</a>
  </div>

</form>

<?php include_once 'inlcudes/footer.php'; ?>