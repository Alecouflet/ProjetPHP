<html>
    <head>
        <title>Bienvenue sur SkoolMeat</title>
        <link rel="stylesheet" href="styleseconnecter.css" />
        <nav>
	        <a href="index.php">Accueil</a>
            <a href="seconnecter.php">About</a>
            
	        <div class="animation start-home"></div>
        </nav>
    </head>
    <body>
        <img class="logo" src="logo.PNG">
    <h1><br>Bienvenue sur SkoolMeat</br></h1>
    
    <form id="login" method="post" action="seconnecter.php">
    <h3>Log In</h3>
    <fieldset id="inputs">
        <input type="text" name="email" placeholder="Adresse Mail" autofocus required>
        <input type="text" name="password" placeholder="Mot de passe" required>
    </fieldset>
    <fieldset id="actions">
        <input class="button1" type="button" value="Se connecter">
    </fieldset>
    <a href="signin.php">
        <input class="button2" type="button" value="S'inscrire">
    </a>
</form>
    
    <?php
    $bdd = new PDO('mysql:host=192.168.65.194; dbname=skoolmeat; charset=utf8', 'root', 'root');

    $mailconnect = $_POST['email'];
    $mdpconnect = $_POST['password'];
    $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
    $requser->execute(array($mailconnect, $mdpconnect));
    $userexist = $requser->rowCount();
    $userinfo = $requser->fetch();
    if ($userexist == 1) {
        echo "Connecté en tant que ".$userinfo['prenom']." ".$userinfo['nom'];
    }
    ?>
    </body>
</html>