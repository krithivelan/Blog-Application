<?php
 	//Create Connection with DB
 	$con = mysqli_connect( ROOT_HOST , ROOT_USER , ROOT_PASS , ROOT_DB);

 	//Check Connection
 	if(mysqli_connect_errno()){
 		//Connection Failed
 		echo "Failed to connect with MYSQL ".mysqli_connect_errno();
 	}
 	else{
 		//Connected
 		//echo "Connected to DB";
 	}

?>