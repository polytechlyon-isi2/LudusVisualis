<html>

<head>
    <meta charset="utf-8" />

    <?php
   include "../includes/header.php";?>
    

        <title>LudusVisualis - Home</title>

        <?php
    foreach ($games as $game): ?>
            <game>
                <div class="col-md-12">
                <h2><?php echo $game->getName() ?></h2>
                    </div>
                <div class="col-md-6">
                <p>
                    <?php echo $game->getDescriptionLong() ?>
                </p>
                    </div>
            </game>
            <?php endforeach; ?>

    include "../includes/footer.php"; ?>
        
                </body>

</html>