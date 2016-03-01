<html>
<head>
   
    <title>Mes movies</title>
</head>
<body>
    <?php
    include "includes/header.php";
    include "includes/connexion.php";
$stmt = $pdo->prepare('SELECT * FROM  movie');
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

?>
    
    <div class="container">
<h1>
    <form id="RenvoieFilm" action="film.php" method="post">
<input type="hidden" name="Id_Film"  value="<?php echo $row[0]?>" />
</form>
<a href='film.php?Id_Film=<?php echo $row[0]; ?>' onclick='document.getElementById("test").submit()'><?php echo $row[1]?></a></h1>
        <div class="row">
            <ul>
        
    <?php
    echo $row[2];
    ?>
            </ul>
        </div>
    

      </div>
    <?php } 
    include "includes/footer.php";
    ?>
  
</body>
</html>