
<?php
	//add the db file using 'require'
	require('config/config.php');
	require('config/db.php');

	//create a query
	//$query = 'SELECT * FROM posts';


	if(isset($_POST['submit'])){
		$title = mysqli_real_escape_string( $con , $_POST['title']);
		$author = mysqli_real_escape_string( $con , $_POST['author']);
		$body = mysqli_real_escape_string( $con , $_POST['body']);


		/////////////////////////////////////////////////////////////////////////////////////////////

		$query = "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";

		/////////////////////////////////////////////////////////////////////////////////////////////

		if(mysqli_query($con , $query )){
			// INSERTED
			header('Location: '.ROOT_URL.'');
		}else{
			//NOT INSERTED
			echo "Error : ".mysqli_error($con);
		}
		


	}

?>

<?php include('inc/header.php'); ?>

	<div class="container">
	<h2>Add Post</h2>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<div class="form-group">
			<label>Title</label><br>
			<input type="text" name="title" class="form-control">
		</div><br>

		<div class="form-group">
			<label>Author</label><br>
			<input type="text" name="author" class="form-control">
		</div><br>

		<div class="form-group">
			<label>Content</label><br>
			<textarea class="form-control" name="body" ></textarea> 
		</div><br>


		<div class="form-group"><br>
		<button type="submit" name="submit" class="btn btn-primary">Submit</button> 
		</div><br>

	</form>
	
	</div>

<?php include('inc/footer.php'); ?>