
<?php
	//add the db file using 'require'
	require('config/config.php');
	require('config/db.php');

	//create a query
	$query = 'SELECT * FROM posts ORDER BY created_at DESC ';


	//pass the  ( connection + query ) = var ==> get the data in $result
	//[ GET the DATA ]
	
	$result = mysqli_query( $con , $query ); 


	//pass the '$result' to fetch the data with MY_ASSOC 
	//[ Fetching the DATA ] 
	
	$posts = mysqli_fetch_all( $result , MYSQLI_ASSOC );


	//free the result

	mysqli_free_result($result);


	//close the connection

	mysqli_close($con);

?>

<?php include('inc/header.php'); ?>

	<div class="container">
	<h2>Posts</h2>
	<?php  foreach($posts as $post): ?>

		<div class="well">

		<h3><?php echo $post['title'] ?></h3>
		<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
		<p><?php echo $post['body'] ?></p>
		<a class="btn btn-default" href="posts.php?id=<?php echo $post['id']; ?>">Read More</a>

		</div>

	<?php endforeach; ?>
	</div>

<?php include('inc/footer.php'); ?>