<html>
<head>
   
    <title>Ludus Visualis</title>
</head>
<body>
    <?php
    include "includes/header.php";

     if (!isset($_POST['id'])){
        include "includes/questionnaire.php";   
     }

    else
        { 
		$checkMax = $pdo->prepare('Select Max(user_id) FROM users');
		$checkMax->execute();
		$res=$checkMax->fetch(PDO::FETCH_NUM);
		$id=$res[0]+1;
        if (isset($_POST['user_email']))
            {
            $stmt = $pdo->prepare("Select * from users where mov_name=:user_email");
            $stmt->bindParam(':user_email', $_POST['user_email']);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count==0){
                $title=$_POST['title'];
                $pdo->quote($title);
            }
        }
        
        if (isset($_POST['shortDescription'])){$shortDescription=$_POST['shortDescription'];
                                            $pdo->quote($shortDescription);}
        if (isset($_POST['longDescription'])){$longDescription=$_POST['longDescription'];$pdo->quote($longDescription);}
        if (isset($_POST['director'])){$director=$_POST['director'];$pdo->quote($$director);}
        if (isset($_POST['year'])){$year=$_POST['year'];$pdo->quote($year);}
        if (isset($_POST['urlImage'])){$urlImage=$_POST['urlImage'];$pdo->quote($urlImage);}
        
        if(isset($title)){
        $insert = $pdo->prepare('INSERT INTO movie (mov_id,mov_name,mov_description_short,mov_description_long,mov_author,mov_year,mov_image)  values (:id,:title,:shortDescription,:longDescription,:director,:year,:urlImage)');
		if ($insert==false)
			{echo"on ne peut pas préparer la requête";}
        $success=$insert->execute(array('id'=>$id,
								'title' =>$title,
                               'shortDescription' =>$shortDescription,
                               'longDescription' =>$longDescription,
                               'director' =>$director,
                               'year' =>$year,
                               'urlImage' =>$urlImage));                 
        }
        else{
            $success=false;
        }
		if($success)
			{ ?> <p> <?php echo("Film bien inséré dans la base de données") ?> </p> <?php ;}
		else
			{ 
            include "includes/questionnaire.php";}   
		}
               ?>
		
</body>
<?php
        include "includes/footer.php";

 ?>
  
</body>
</html>