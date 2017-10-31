
<?php
	//add the db file using 'require'
	require('config/config.php');
	require('config/db.php');

	//create a query
	//$query = 'SELECT * FROM posts';


	if(isset($_POST['submit']))
	 {

		$update_id = mysqli_real_escape_string( $con , $_POST['update_id']);
		$title = mysqli_real_escape_string( $con , $_POST['title']);
		$author = mysqli_real_escape_string( $con , $_POST['author']);
		$body = mysqli_real_escape_string( $con , $_POST['body']);


		/////////////////////////////////////////////////////////////////////////////////////////////

		$query = "UPDATE posts SET 
					title='$title',
					author='$author',
					body= '$body'
					WHERE id ={$update_id}";

		/////////////////////////////////////////////////////////////////////////////////////////////

		if(mysqli_query($con , $query )){
			// INSERTED
			header('Location: '.ROOT_URL.'');
		}else{
			//NOT INSERTED
			echo "Error : ".mysqli_error($con);
		}
	}

	//GET id :-
	$id = mysqli_real_escape_string($con, $_GET['id']);

	//create a query
	$query = 'SELECT * FROM posts WHERE id ='.$id ;

	//pass the  ( connection + query ) = var ==> get the data in $result
	//[ GET the DATA ]
	
	$result = mysqli_query($con, $query); 

	//pass the '$result' to fetch the data with MY_ASSOC 
	//[ Fetching the DATA ] 
	
	$post = mysqli_fetch_assoc($result);
	//var_dump($post);

	//free the result

	mysqli_free_result($result);

	//close the connection

	mysqli_close($con);

?>

<?php include('inc/header.php'); ?>

	<div class="container">
		<h2>Edit Post</h2>

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="form-group">
				<label>Title</label><br>
				<input type="text" name="title" class="form-control" value="<?php  echo $post['title'];  ?>" >
			</div><br>

			<div class="form-group">
				<label>Author</label><br>
				<input type="text" name="author" class="form-control" value="<?php  echo $post['author'];  ?>" >
			</div><br>

			<div class="form-group">
				<label>Content</label><br>
				<textarea class="form-control" name="body" ><?php  echo $post['body'];  ?></textarea> 
			</div><br>
			
			<input type="hidden" name="update_id" value="<?php echo $post['id']; ?>"  >
			<input type="submit" name="submit" value="submit" class="btn btn-primary"  > 
			
		</form>
	
	</div>

<?php include('inc/footer.php'); ?>


