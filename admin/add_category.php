<?php include_once 'inlcudes/header.php'; ?>

<?php

   $db = new Database;


   if (isset($_POST['submit'])) {     

      $category_name =  mysqli_real_escape_string($db->link, $_POST['category_name']);

      //Simple validation
      if (empty($category_name)) {
        //Set Error
        $error = "Fill All The Details !";
      }
      else{
        $query = "INSERT INTO categories
                      (name) VALUES ('$category_name')";
        $insert_row = $db->insert($query);      
      }           
   }

 ?>

<!-- form -->
<form method="POST" action="add_category.php">

  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
  </div>

  <div class="form-group">	
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class=" btn btn-primary">Cancel</a>
  </div>

</form>

<?php include_once 'inlcudes/footer.php'; ?>