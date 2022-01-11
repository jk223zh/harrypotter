<?php 

function maleGender(){
    include("logic.php"); // Connect to server

    $maleInfo = "SELECT COUNT(*) AS MaleCount 
    FROM characters 
    WHERE Gender = 'male'";

    $maleInfoResult = mysqli_query($conn, $maleInfo);
    while ($row = mysqli_fetch_assoc($maleInfoResult)) {
  
        echo '<div class="info">
          <div class="containerBar">
          <div class="bar male"> Male:'. floor($row['MaleCount']/26*100) . '%' .'
          </div>
          </div>
          </div>';
    }
  }
function femaleGender(){
      include("logic.php");

      $femaleInfo = "SELECT COUNT(*) AS FemCount 
      FROM characters 
      WHERE Gender = 'female'";

      $femaleInfoResult = mysqli_query($conn, $femaleInfo);
      while ($row = mysqli_fetch_assoc($femaleInfoResult)) {
    
        echo '<div class="info">
        <div class="containerBar">
        <div class="bar female"> Female:'. ceil($row['FemCount']/26*100) . '%' .'
        </div>
        </div>
        </div>';
      }
}

function staff(){
    include("logic.php");

    $charactersInfo = "SELECT COUNT(*) AS Staff 
    FROM characters 
    WHERE HogwartsStaff = 'True'";
  
    $charactersInfoResult = mysqli_query($conn, $charactersInfo);
    while ($row = mysqli_fetch_assoc($charactersInfoResult)) {
      
      echo '<div class="info">
      <div class="containerBar">
      <div class="bar staff"> Staff:'. floor($row['Staff']/26*100) . '%' .'
      </div>
      </div>
      </div>';
    }
}

function student(){
   include("logic.php");

   $charactersInfo = "SELECT COUNT(*) AS Student 
   FROM characters 
   WHERE HogwartsStudent = 'True'";
  
   $charactersInfoResult = mysqli_query($conn, $charactersInfo);
    while ($row = mysqli_fetch_assoc($charactersInfoResult)) {
      
      echo '<div class="info">
      <div class="containerBar">
      <div class="bar student"> Students:'. floor($row['Student']/26*100) . '%' .'
      </div>
      </div>
      </div>';
    }
}
function other(){
    include("logic.php");
    $charactersInfo = "SELECT COUNT(*) AS Other 
    FROM characters 
    WHERE HogwartsStudent = 'False' AND HogwartsStaff = 'False'";

    $charactersInfoResult = mysqli_query($conn, $charactersInfo);
    while ($row = mysqli_fetch_assoc($charactersInfoResult)) {
  
      echo '<div class="info">
      <div class="containerBar">
      <div class="bar other"> Other:'. ceil($row['Other']/26*100) . '%' .'
      </div>
      </div>
      </div>';
    }
}

function createCards() {

  include("logic.php");

  $charactersInfo = "SELECT * FROM characters ORDER BY id";
  $charactersInfoResult = mysqli_query($conn, $charactersInfo);
  
  while ($row = mysqli_fetch_assoc($charactersInfoResult)) {

      echo '<div class="flip-card">
      <div class="flip-card-inner">
       <div class="flip-card-front">
       
        <img src="'. $row['Image'] .'" alt="characterImg" class="charactersImg">
        <h1>'. $row['Name'] .'</h1>
        
       </div>
       <div class="flip-card-back">
       <h1>'. $row['Name'] .'</h1>
       <p>Ancestry: '. $row['Ancestry'] .'</p>
       <p>Species: '. $row['Species'] .'</p>
       <p>Alive: '. $row['Alive'] .'</p>
       <p>Born:'. $row['YearOfBirth'] .'</p>
       </div>
      </div>
     </div>';
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

  <main>
    <div id=info>
              <h4>Movie character statitics:</h4>
              <?php maleGender(); ?> 
              <?php femaleGender(); ?> 
              <?php staff() ?>
              <?php student() ?>
              <?php other() ?>
              <p>(Based on our database)<p>
</div>
      <div class=content>
        <h2>Main Characters in the first three movies </h2>
          <div class="cards">
              <?php createCards(); ?> 
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
