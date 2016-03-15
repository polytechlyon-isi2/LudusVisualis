    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
        
</head>
<body>
    <?php include "connexion.php" ?>
    <div class="container">
        <div class="navbar navbar-default" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">LudusVisualis</a>
    </div>
    <!-- Partie de la barre masquée si la surface d'affichage est insuffisante -->
    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Ajouter un jeu</a></li>
           
        </ul>
        <ul class="nav navbar-nav navbar-right">
             <li><a href="#">Administration</a></li>
	<li>
        <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Connexion
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Profil</a></li>
                  <li><a href="authentification.php">Connexion/Déconnexion</a></li>
                </ul>
        </div>
	</li>
        </ul>
    </div>
</div>
    </div>
 