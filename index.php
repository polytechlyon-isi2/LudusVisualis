<html>
<head>
   
    <title>Ludus Visualis</title>
</head>
<body>
    <?php
    include "includes/header.php";
$stmt = $pdo->prepare('SELECT * FROM  videogames');
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

?>
    
    <div class="container">
<h1>
    <form id="RenvoieJeu" action="jeu.php" method="post">
<input type="hidden" name="Id_Jeu"  value="<?php echo $row[0]?>" />
</form>
<a href='jeu.php?Id_Jeu=<?php echo $row[0]; ?>' onclick='document.getElementById("test").submit()'><?php echo $row[1]?></a></h1>
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