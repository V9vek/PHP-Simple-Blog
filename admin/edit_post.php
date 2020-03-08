<?php include_once 'inlcudes/header.php'; ?>

<?php

    $id = $_GET['id'];

    $db = new Database();

    $query = "SELECT * FROM posts WHERE id=".$id;
    $post = $db->select($query)->fetch_assoc(); 


    $query = "SELECT * FROM categories";
    $categories = $db->select($query); 

?>

<?php
  
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

    $query = "UPDATE posts
                SET title='$title',
                body='$body',
                category='$category',
                author='$author',
                tags='$tags'
                WHERE id=".$id;

    $update_row = $db->update($query);      
   }
  }
 ?>

 <?php

      //Checking if delete is submitted 
      if (isset($_POST['delete'])) {

          $query = "DELETE FROM posts WHERE id = $id";
          $delete_row = $db->delete($query);
      }
  ?>

<!-- form -->

<!-- Adding id to the action URL so that we can GET id , as this redirect to same file.php -->
<form method="POST" action="edit_post.php?id=<?php echo $id; ?>">

  <div class="form-group">
    <label>Post Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter Post Title" value="<?php echo $post['title'] ?>">
  </div>

  <div class="form-group">
    <label>Post Body</label>
   	<textarea name="body" class="form-control" placeholder="Enter Post Body"><?php echo $post['body']; ?></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select name="category">
      <?php while($row = $categories->fetch_assoc()) : ?>

        <!-- Showing category selected of the post in drop down -->
       <?php 
          if($post['category'] == $row['id'])
              $selected = 'selected';
          else
              $selected = '';     
       ?>
         <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?> > 
            <?php echo $row['name']; ?>   
         </option>

      <?php endwhile; ?>
    </select> 
  </div>

  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Author Name" value="<?php echo $post['author'] ?>">
  </div>

  <div class="form-group">
	  <label>Tags</label>
	  <input type="text" name="tags" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags'] ?>">
  </div>

  <div class="form-group">	
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class=" btn btn-primary">Cancel</a>
  <input type="submit" name="delete" class="btn btn-danger" value="Delete">
  </div>

</form>

<?php include_once 'inlcudes/footer.php'; ?>