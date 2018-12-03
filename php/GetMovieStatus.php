<?php
	$table = "movies";

	include "../config.php";

	$sql = mysqli_query($conn,"SELECT * FROM movies");
    $rows = array();

    if(!($sql === FALSE)) {
        while($row = mysql_fetch_array($sql)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo "{}";
    }
?>