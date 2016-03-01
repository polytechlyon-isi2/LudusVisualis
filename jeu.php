<!doctype html>
<html>
    <head>
        <?php
            include 'includes/header.php';

        ?>
        
        <!-- CONTENU -->
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <?php
						
                        foreach($pdo()->query('SELECT game_name, game_description_long,game_author,game_year, game_image, game_type,  game_price, game_number  from VideoGames where mov_id='.$_GET['jeu'].';') as $row) {
                            $row[0]=escape($row[0]);
							$row[1]=escape($row[1]);
							$row[2]=escape($row[2]);
							$row[3]=escape($row[3]);
							$row[4]=escape($row[4]);
                            $row[5]=escape($row[5]);
                            $row[6]=escape($row[6]);
                            $row[7]=escape($row[7]);
							echo "<div class='col-md-4'>";
                            echo "<div class='thumbnail'>";
                              echo "<img src='$row[4]'>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                            echo "<h2>$row[0]</h2>";
							echo "<p>$row[2], $row[3],$row[5]</p>";
                            echo "<p>$row[1]€,$row[7]disponnible </p>";
                            echo "<a href='edit.php?film=$_GET[jeu]'><button type='button' class='btn btn-default'>Editer</button></a>";
                        echo "</div>";
                        }
                        ?>
                </div>
            </div>
            </br>
        </div>
            

        <!-- FOOTER !!! -->
        <?php
            include 'includes/footer.php';
        ?>
        
        
    </body>
</html>