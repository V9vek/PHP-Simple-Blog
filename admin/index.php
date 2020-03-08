<?php 
	include_once 'inlcudes/header.php'; 
 ?>
<?php
	//Create DB Object
	$db = new Database; 
	
	//Selecting posts table all data, and categories table name col by applying inner join
	$query = "SELECT posts.*, categories.name FROM posts
				INNER JOIN categories
				ON posts.category=categories.id
				ORDER BY posts.id DESC";
	$posts = $db->select($query);


	//Select query of categories table
	$query = "SELECT * FROM categories 
				ORDER BY id DESC";
	$categories = $db->select($query);


 ?>
<!-- posts table in admin area -->			
<table class="table table-striped">
  <tr>
  	<th>Post ID#</th>
  	<th>Post Title</th>
  	<th>Category</th>
  	<th>Author</th>
  	<th>Date</th>
  </tr>
  
  <?php while($row = $posts->fetch_assoc()) : ?>

	<tr>
  	<td><?php echo $row['id']; ?></td>
  	<!-- Having link to edit the post attached with the post title -->
  	<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
  	<td><?php echo $row['name']; ?></td>
  	<td><?php echo $row['author']; ?></td>
  	<td><?php echo formatDate($row['date']); ?></td>
  	</tr>

  <?php endwhile; ?>
  
</table>


<!-- categories table in admin area -->
<table class="table table-striped">
  <tr>
  	<th>Category ID#</th>
  	<th>Category Name</th>
  </tr>
  <?php while($row = $categories->fetch_assoc()) : ?>

	<tr>
  	<td><?php echo $row['id']; ?></td>
  	<!-- Having link to edit the category attached with the categopry id -->
  	<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
  	</tr>
  	
  <?php endwhile; ?>
</table>


<?php 
	include_once 'inlcudes/footer.php'; 
 ?>





