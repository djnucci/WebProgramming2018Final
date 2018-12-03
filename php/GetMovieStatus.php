<?php
	require_once "../config.php";
	$table = "movies";

	//collect results from movieSelector dropdown
	$movie = $_POST["movie"];

	$seatrequest = "SELECT seat_ID, bookState FROM ".$table." WHERE bookState='free' AND movie='".$movie."'";

	if($result = mysqli_query($conn, $seatrequest)){
		if(mysqli_num_rows($result) > 0){
			//create dropdown entry for each SQL table row
			while($row = mysqli_fetch_array($result)){
				echo "<option value='".$row["seat_ID"]."'>"." Seat ".$row["seat_ID"]."</option>";}
				// Free result set
				mysqli_free_result($result);
			} else{
                echo "No records matching your query";
            }
        } else{
            echo "ERROR: Could not execute " . mysqli_error($conn);
        }
	// Close connection
	echo "</select>";
	echo "<input type='submit' value='Book Seats'>";
	//close connection
	mysqli_close($conn);
?>