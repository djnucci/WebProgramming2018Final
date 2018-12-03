<?php
	$movieName = $_POST["Movies"];
	$timeA = $timeB = $timeC = "";

	include "config.php";

	function queryMaker($movieName) {
		$queryArray = array();
			for ($i = 0; $i < 3; $i++){
				if ($i == 0){
					$command = "SELECT start_time FROM movies WHERE movie_name = $movieName AND room_ID = 'A'";
					array_push($queryArray,$command);
				} else if ($i == 1){
					$command = "SELECT start_time FROM movies WHERE movie_name = $movieName AND room_ID = 'B'";
					array_push($queryArray,$command);
				} else {
					$command = "SELECT start_time FROM movies WHERE movie_name = $movieName AND room_ID = 'C'";
					array_push($queryArray,$command);
				}
			}
		return $queryArray;
	}

	$queryArray = queryMaker($movieName);

	for ($i = 0; $i < 3; $i++){
		$sql = mysqli_query($conn,$queryArray[$i]);
		if(!($sql === FALSE)) {
			$row = mysqli_fetch_array($sql);
			if ($i == 0){
				$timeA = $row[0];
			} else if ($i == 1){
				$timeB = $row[0];
			} else{
				$timeC = $row[0];
			}
		}
	}

	echo '<select name="times"><span id="chooseTime">';
	echo '<option value="'.htmlspecialchars("null").'">'.htmlspecialchars("Please select a time...").'</option>';
	for ($i = 0; $i < 3; $i++){
		if ($i == 0){
			echo '<option value="'.htmlspecialchars($i).'">'.htmlspecialchars($timeA).'</option>';
		} else if ($i == 1){
			echo '<option value="'.htmlspecialchars($i).'">'.htmlspecialchars($timeB).'</option>';
		} else{
			echo '<option value="'.htmlspecialchars($i).'">'.htmlspecialchars($timeC).'</option>';
		}
	}
	echo '</span></select>';

?>