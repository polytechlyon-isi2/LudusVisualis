<html>
<head>
    <meta charset="utf-8" />
     <?php
   include "../includes/header.php";?>
    <link href="LudusVisualis.css" rel="stylesheet" />
    <title>LudusVisualis - Home</title>  
    
    <?php
    foreach ($games as $game): ?>
    <game>
        <h2><?php echo $game->getName() ?></h2>
        <p><?php echo $game->getDescriptionLong() ?></p>
    </game>
    <?php endforeach; 
include "../includes/footer.php"; ?>
    </body>

</html>