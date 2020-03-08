<?php include_once 'inlcudes/header.php'; ?>

<?php

    $id = $_GET['id'];

    $db = new Database();

    $query = "SELECT * FROM categories where id=".$id;
    $category = $db->select($query)->fetch_assoc(); 

?>
<?php 
	
	if (isset($_POST['submit'])) {     

      $category_name =  mysqli_real_escape_string($db->link, $_POST['category_name']);

      //Simple validation
      if (empty($category_name)) {
        //Set Error
        $error = "Fill All The Details !";
      }
      else{
        $query = "UPDATE categories
        			SET name='$category_name'
        			where id=$id";
        $update_row = $db->update($query);      
      }           
   }
	
 ?>
  <?php

      //Checking if delete is submitted 
      if (isset($_POST['delete'])) {

          $query = "DELETE FROM categories WHERE id = $id";
          $delete_row = $db->delete($query);
      }
  ?>
<!-- form -->

<!-- Adding id to the action URL so that we can GET id , as this redirect to same file.php -->
<form method="POST" action="edit_category.php?id=<?php echo $id ?>">

  <div class="form-group">
    <label>Category Name</label>
    <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" value="<?php echo $category['name'] ?>">
  </div>

  <div class="form-group">	
  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  <a href="index.php" class=" btn btn-primary">Cancel</a>
  <input type="submit" name="delete" class="btn btn-danger" value="Delete">
  </div>

</form>

<?php include_once 'inlcudes/footer.php'; ?>