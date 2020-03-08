<?php
		include_once '..\config\config.php';
		include_once '..\libraries\Database.php'; 
		include_once '..\helpers\format_helper.php';
	 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Area</title>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body>


	<div class="blog-masthead">
	  	<div class="container">
	  		<nav class="blog-nav">
	  			<a class="blog-nav-item active" href="index.php">Dashboard</a>
	      		<a class="blog-nav-item" href="add_post.php">Add Posts</a>
	      		<a class="blog-nav-item" href="add_category.php">Add Category</a>
					<!-- Go to main index.php -->
	      		<a class="blog-nav-item pull-right ml-auto" href="../">Visit Blog</a>
	  		</nav>
  		</div>
  	</div>

	<div class="container-fluid ">

		<div class="blog-header">
			<h2>Admin Area</h2>
		</div>

		<div class="row">

			<div class="ml-auto col-md-12 blog-main">


			<!-- Show msg if post is added in admin area -->
			<?php if (isset($_GET['msg'])) : ?>
				<div class="alert alert-success">
					<?php echo htmlentities($_GET['msg']); //htmlentities to prevent harmful data in url ?>
				</div>
			<?php endif; ?>
