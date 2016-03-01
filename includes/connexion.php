<html>

    <?php

try{
$pdo = new PDO("mysql:host=localhost;dbname=ludusvisualis;","root","");
$pdo->exec('SET NAMES utf8');
}
catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
    
</html>