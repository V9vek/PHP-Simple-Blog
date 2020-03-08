</div><!-- /.blog-main -->
			<div class="col-md-3 mr-auto blog-sidebar">
				<div class="p-3">
			      <div class="sidebar-module sidebar-module-inset">
			        <h4>About</h4>
			       	<p><?php echo $siteDescription; ?></p>
			      </div>

			      <div class="sidebar-module">
			        <h4>Categories</h4>
			        <?php if ($categories) : ?>

					    <ol class="list-unstyled mb-0">
					        
					        <?php while($row = $categories->fetch_assoc()) : ?>
						        <li><a href="posts.php?category=<?php echo $row['id']; ?>">
						        	<?php echo $row['name']; ?></a></li>
						    <?php endwhile; ?>
  
					    </ol>
			        	
			        <?php else : ?>
			        	<p>There are no categories yet !</p>
			        <?php endif; ?>	
			      </div>
			    </div><!-- /.blog-sidebar -->	
			    </div>			
		</div>
	</div>
	
    

	<div class="blog-footer">
	  	<p>PHP Lovers Blog &copy: 2020</p>
	  	<p>
    		<a href="#">Back to top</a>
  		</p>
	</div>

	<!-- Bootstrap Core js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
