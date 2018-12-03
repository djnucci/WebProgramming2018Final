<?php
	if ($_POST["Movies"] == "movie0"){
		$movieName = "70 Jump Street: Dental Hygiene School";
	} else if ($_POST["Movies"] == "movie1"){
		$movieName = "8 Hours of Sleep on Elm Street";
	} else if ($_POST["Movies"] == "movie2"){
		$movieName = "Stan Lee Cameo's: The Movie";
	} else if ($_POST["Movies"] == "movie3"){
		$movieName = "Obligatory Rom-Com: A Horror Film";
	} else if ($_POST["Movies"] == "movie4"){
		$movieName = "Spoon: A 'The Office' Retrospective";
	}
	error_log(var_dump($_POST["Movies"]));
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

	echo '
	<!DOCTYPE html>
	<html>
    <head>
        <meta charset="UTF-8">
        <title>SAND Movies</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css">

    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SAND Movies</a>
              </div>
              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="/html/Contact.html" data-toggle="modal">Contact</a></li>
                </ul>
              </div>
            </div>

          </div>
          </div>
          <div class="jumbotron text-center">
            <h1>SAND Movies</h1>
            <p>All the worlds a stage</p>
          </div>

        <h3>Play Times:</h3>
        <form action="../php/GetMovieStatus.php" method="POST" id="hello">
          <div class="wrapper">
              <select name="Times" id="time">
                  <span id="times">
                    <option value="null">Please select a time...</option>
                    <option value="time0">';echo json_encode($timeA); echo'</option>
                    <option value="time1">';echo json_encode($timeB); echo'</option>
                    <option value="time2">';echo json_encode($timeC); echo'</option>
                  </span>
              </select>
          </div>
                <div style="text-align:center"><input type="submit" name='submit' form="hello" value="Submit" id="submitDOB" onclick="window.location.href='./html/Seating.html'"></div>
      </form>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>';
?>
