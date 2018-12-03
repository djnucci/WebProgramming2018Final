<?php
	if ($_POST["Movies"] == "movie0"){
		$movieName = "70 Jump Street: Dental Hygiene School";
	} else if ($_POST["Movies"] == "movie1"){
		$movieName = "8 Hours of Sleep on Elm Street";
	} else if ($_POST["Movies"] == "movie2"){
		$movieName = "Stan Lee Cameo's: The Movie";
	} else if ($_POST["Movies"] == "movie3"){
		$movieName = "Obligatory Rom-Com: A Horror Film";
	} else{
		$movieName = "Spoon: A 'The Office' Retrospective";
	}
	echo json_encode($movieName);
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

	header("location: ../html/Times.html");
?>