<?php 

// Show information about movies
function createCards() {
    include("logic.php"); // Connect to server
  
    $moviesInfo = "SELECT * FROM movies ORDER BY Year";
    $moviesInfoResult = mysqli_query($conn, $moviesInfo);
    
    while ($row = mysqli_fetch_assoc($moviesInfoResult)) {
  

       echo '<div class="containerMovies">
      <img src='. $row['Image'] .' class="imageMovies">
      <div><i>"'. $row['Title'] .'"</i></div>
      <div class="text">Rate on IMBD: '. $row['Imbd'] .'</div>
      </div>';
    }
  }

// Show information about actors and how many sentences they had in first three movies
function createActors() {
  include("logic.php");  // Connect to server

  $quotes = "SELECT COUNT(quotes.Sentence) AS NumOf, actors.Name 
  FROM actors INNER JOIN quotes ON actors.Character = quotes.Character 
  GROUP BY actors.Name 
  ORDER BY NumOf Desc
  LIMIT 5";

  $quotesResult = mysqli_query($conn, $quotes);
  while ($row = mysqli_fetch_assoc($quotesResult)) {
    static $count = 1;
    echo "<div class='info'><h2>" .$count++ .". ". $row['Name'] .": ".  $row['NumOf'] . "</h2></div>";
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

<main id="moviesMain">

    <?php createCards(); ?> 
    <div class=quotes>
        <h2>Quotes toplist!</h2>
            <?php createActors(); ?> 
            <p>Based on the first three movies.</p>
    </div>
</main> 

  <footer>
     <h4>Vendela Österman & Jennie Krantz</h4>
     <h4>Database Theory IDV513</h4>
     <h4>HT21</h4>
  </footer>
</body>
</html>