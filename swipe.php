<?php session_start(); ?>
<html>

<head>
    <title>Socialiser - SkoolMeat</title>
    <link rel="stylesheet" href="swipe.css" />
    <nav>
	    <a href="index.php">Accueil</a>
        <a href="seconnecter.php">Connexion</a>
        <a href="signin.php">Inscription</a>
        <a href="profilperso.php">Profil</a>
	    <div class="animation start-home"></div>
    </nav>
</head>

<body>
    <img class="logo" src="logo.PNG">
    <h1>Socialiser</h1>
    <?php 
    $bdd = new PDO('mysql:host=192.168.65.194; dbname=skoolmeat; charset=utf8', 'root', 'root');
    $mailconnect = $_SESSION['mail'];
    $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
    $requser->execute(array($mailconnect));
    $userexist = $requser->rowCount();
    $userinfo = $requser->fetch();
    ?>
    <h2> Meat other pupils : </h2><br> 
    <?php
    
    if($_SESSION['idstranger'] == 0 && $userinfo['id_user'] != 1){
        $_SESSION['idstranger'] = 1;
    }
    else if($_SESSION['idstranger'] == $userinfo['id_user']){
        $_SESSION['idstranger'] += 1;
    }
    $idpresent = $_SESSION['idstranger'];
    $reqstranger = $bdd->prepare("SELECT * FROM user WHERE id_user = ?");
    $reqstranger->execute(array($idpresent));
    $strangerexist = $reqstranger->rowCount();
    $strangerinfo = $reqstranger->fetch();
    $_SESSION['idstranger'] = $strangerinfo['id_user'];
    ?>
    <div class="card">
        <img src="icon.png">
        <h1>Nom : <?php echo $strangerinfo['nom']." ".$strangerinfo['prenom'];?></h1>
            <p class="title">Age : <?php echo $strangerinfo['age'];?></p>
            <p class="title">Email : <?php echo $strangerinfo['mail'];?></p>
            <p class="title2">Ma bio : <?php echo $strangerinfo['bio'];?></p>
    </div>
    <form method="post" action="like.php">
        <input class="button" type="submit" value="Like">
    </form>
    <form method="post" action="nextprofile.php">
        <input class="button" type="submit" value="Suivant">
    </form>
    <form method="post" action="disconnect.php">
        <input class="button" type="submit" value="Deconnexion">
    </form>
</body>

</html>