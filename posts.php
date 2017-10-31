
<?php
	//add the db file using 'require'
	require('config/config.php');
	require('config/db.php');


	if(isset($_POST['delete']))
	 {

		$delete_id = mysqli_real_escape_string( $con , $_POST['delete_id']);
		
		/////////////////////////////////////////////////////////////////////////////////////////////

		$query = "DELETE FROM posts WHERE id=".$delete_id;

		/////////////////////////////////////////////////////////////////////////////////////////////

		if(mysqli_query($con , $query )){
			// INSERTED
			header('Location: '.ROOT_URL.'');
		}else{
			//NOT INSERTED
			echo "Error : ".mysqli_error($con);
		}
	}



	//get ID
	$id = mysqli_real_escape_string($con, $_GET['id']);

	//create a query
	$query = 'SELECT * FROM posts WHERE id ='.$id ;

	//pass the  ( connection + query ) = var ==> get the data in $result
	//[ GET the DATA ]
	
	$result = mysqli_query($con, $query); 

	//pass the '$result' to fetch the data with " fetch_assoc " 
	//[ Fetching the DATA ] 
	
	$post = mysqli_fetch_assoc($result);

	//free the result

	mysqli_free_result($result);

	//close the connection

	mysqli_close($con);

?>
<?php include('inc/header.php'); ?>

	<div class="container">
	<br>

		<a class="btn btn-default" href="<?php echo ROOT_URL; ?>"> Back </a>

		<h2><?php echo $post['title'] ?></h2>
		<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
		<p><?php echo $post['body'] ?></p>

		<hr>
		<a href="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-default" >Edit</a>

		<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
			<input type="submit" name="delete" value="Delete" class="btn btn-danger" >
		</form>

	</div>

<?php include('inc/footer.php'); ?>

