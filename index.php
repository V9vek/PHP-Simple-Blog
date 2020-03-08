
	<?php
		include_once 'config\config.php';
		include_once 'libraries\Database.php';
		include_once 'inlcudes\header.php'; 
		include_once 'helpers\format_helper.php';
	 ?>
	 <?php

	 	//Create DB object
	 	$db = new Database();

	 	//Create Query
	 	$query = "SELECT * FROM posts ORDER BY id DESC";

	 	//Run Query
	 	$posts = $db->select($query);

	 	//Create Query
	 	$query = "SELECT * FROM categories";

	 	//Run Query
	 	$categories = $db->select($query);
	  ?>

	<?php
		//Checking if posts exits or not
		if ($posts) :
	 ?>
	 	<?php while($row = $posts->fetch_assoc()) : ?>

				<div class="p-3">
			      <div class="blog-post">
			        <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
			        <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
						<?php echo shortenText($row['body'],50); ?>
						<a href="post.php?id=<?php echo $row['id']; ?>" class="readmore">Read More</a>
				  </div>
			    </div><!-- /.blog-post -->

		<?php endwhile; ?>	      


	<?php else : ?>
		<p>There are no posts yet !</p>
	<?php endif ; ?>

	<?php
		include_once 'inlcudes\footer.php'; 
	 ?>
			