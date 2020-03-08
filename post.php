
	<?php
		include_once 'config\config.php';
		include_once 'libraries\Database.php';
		include_once 'inlcudes\header.php';
		include_once 'helpers\format_helper.php'; 
	 ?>
	 <?php

	 	$id = $_GET['id'];

	 	$db = new Database();
	 	$query = "SELECT * FROM posts WHERE id=".$id;
	 	$post = $db->select($query)->fetch_assoc(); 


	 	$query = "SELECT * FROM categories";
	 	$categories = $db->select($query); 

	  ?>
				<div class="p-3">
			      <div class="blog-post">
			        <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
			        <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author']; ?></a></p>
						<p><?php echo $post['body']; ?></p>
						
			      </div><!-- /.blog-post -->
				</div>

	<?php
		include_once 'inlcudes\footer.php'; 
	 ?>
			