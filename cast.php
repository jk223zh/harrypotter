<?php 
function createActors() {
  include("logic.php");  

  $actorsInfo = 
  "SELECT actors.Name AS actorName, characters.Name, characters.id 
  FROM actors 
  INNER JOIN characters 
  ON actors.Character = characters.Name 
  ORDER BY characters.id";
  
  $actorsInfoResult = mysqli_query($conn, $actorsInfo);
  
  while ($row = mysqli_fetch_assoc($actorsInfoResult)) {

      echo '<div>
      <dt>'. $row['Name'] . '</dt>
              <dd>' . $row['actorName'] . '</dd>
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

  <main id="mainCast">
  
    <div class=actorsContent>
        <div class="actorsCards">

    <dl class="cast-list">
        <?php createActors(); ?>
    </dl>
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
