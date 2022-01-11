<?php 

function houseG() {  //             Gryffindor
    include("logic.php");
  $houseInfo = "SELECT Name FROM characters WHERE House ='Gryffindor'";
  $houseInfoResult = mysqli_query($conn, $houseInfo);
  while ($row = mysqli_fetch_assoc($houseInfoResult)) {
      echo "<p>" . $row['Name'] . "</p>";
  }
}

function houseH() {  //             Hufflepuff
    include("logic.php");
    $houseInfo = "SELECT Name FROM characters WHERE House ='Hufflepuff'";
    $houseInfoResult = mysqli_query($conn, $houseInfo);
    while ($row = mysqli_fetch_assoc($houseInfoResult)) {
        echo "<p>". $row['Name']. "</p>";
    }
}

function houseS() {  //             Slytherin
    include("logic.php");

    $houseInfo = "SELECT Name FROM characters WHERE House ='Slytherin'";
    $houseInfoResult = mysqli_query($conn, $houseInfo);
    while ($row = mysqli_fetch_assoc($houseInfoResult)) {
        echo "<p>". $row['Name']. "</p>";
    }
}

  function houseR() { //             Rawenclaw
      include("logic.php");
    $houseInfo = "SELECT Name FROM characters WHERE House ='Ravenclaw'";
    $houseInfoResult = mysqli_query($conn, $houseInfo);
    while ($row = mysqli_fetch_assoc($houseInfoResult)) {
        echo "<p>". $row['Name']. "</p>";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<title>Harry Potter</title>
</head>
<body>

  <header>
    <div class="background">
     <h1>Harry Potter</h1>
    </div> 
  </header>

<nav>
  <ul>
    <li><a href="index.php">General Info</a></li>
    <li><a href="house.php">Houses</a></li>
    <li><a href="movies.php">Movies</a></li>
    <li><a class="active" href="cast.php">Cast</a></li>
  </ul>
</nav>

  <main class="house">
  
    <div id=houseContent>

    

            <div class="houseDiv" >
            <h2>Gryffindor:</h2>
            <?php houseG();?> 
            </div>

            <div class="houseDiv">
            <h2>Hufflepuff:</h2>
            <?php houseH();?> 
            </div>

            <div class="houseDiv">
            <h2>Slytherin:</h2>
            <?php houseS();?> 
            </div>

            <div class="houseDiv">
            <h2>Ravenclaw:</h2>
            <?php houseR();?> 
            </div>

    </div>
  </main> 

  <footer>
     <h4>Vendela Österman & Jennie Krantz</h4>
     <h4>Database Theory IDV513</h4>
     <h4>HT21</h4>
  </footer>
</body>
</html>