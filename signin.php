<html>
    <head>
        <title>
            S'inscrire - SkoolMeat
        </title>
        <link rel="stylesheet" href="signin.css" />
        <nav>
	        <a href="index.php">Accueil</a>
            <a href="seconnecter.php">Connexion</a>
            <a href="signin.php">Inscription</a>
	        <div class="animation start-home"></div>
        </nav>
    </head>
    <body>
    <img class="logo" src="logo.PNG">
        <h1><br>S'inscrire sur SkoolMeat</br></h1>
        <form id="login" method="post" action="seconnecter.php">
    <h3>Inscription</h3>
    <fieldset id="inputs">
        <input type="text" name="email" placeholder="Adresse Mail" autofocus required><b style="font-size:20px">@la-providence.net</b>
        <input type="text" name="password" placeholder="Mot de passe" required>
        <input type="text" name="confirmpassword" placeholder="Confirmez votre Mot de passe" required>
        <input type="text" name="nom" placeholder="Votre Nom" required>
        <input type="text" name="prenom" placeholder="Votre Prenom" required>
        <input type="text" name="age" placeholder="Votre Age" required>
    </fieldset>
    <a href="index.php">
        <input class="button2" type="button" value="C'est parti!"><br>
    </a>
    <fieldset id="actions">
        <input class="button1" type="button" value="Se connecter">
    </fieldset>    
        <a href="seconnecter.php"><br>Se connecter</br></a>
        <h2>Fondé par Theo Garnon et Alexis Lecouflet</h2>
    </body>
</html>

