<?php session_start(); ?>
<html>

<head>
    <title>Mon profil - TinderPHP</title>
    <link rel="stylesheet" href="profileperso.css" />
    <nav>
	    <a href="index.php">Accueil</a>
        <a href="seconnecter.php">Connexion</a>
        <a href="signin.php">Inscription</a>
        <a href="disconnect.php">Deconnexion</a>
	    <div class="animation start-home"></div>
    </nav>
</head>

<body>
<img class="logo" src="logo.PNG">
    <p><h1>SkoolMeat</h1></p>
    <p><h2>Mon profil</h2></p>
    <?php
    $bdd = new PDO('mysql:host=192.168.65.194; dbname=skoolmeat; charset=utf8', 'root', 'root');
    $mailconnect = $_SESSION['mail'];
    $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
    $requser->execute(array($mailconnect));
    $userexist = $requser->rowCount();
    $userinfo = $requser->fetch();?>
    <div class="card">
        <img src="icon.png">
        <h1>Nom : <?php echo $userinfo['nom']." ".$userinfo['prenom'];?></h1>
            <p class="title">Age : <?php echo $userinfo['age'];?></p>
            <p class="title">Email : <?php echo $userinfo['mail'];?></p>
            <p class="title2">Ma bio : <?php echo $userinfo['bio'];?></p>
            <form method="post" action="">
        <input class="bio" type="text" name="bio">
        <input class="button" type="submit" name="submit" value="Editer ma bio">
    </form>
    </div>
    <?php $modify = $bdd->prepare("UPDATE `user` SET `bio` = ? WHERE `user`.`id_user` = ?");
    $modify->execute(array($_POST['bio'],$userinfo['id_user']));?>
    <form method="post" action="swipe.php">
        <input class="button" type="submit" value="Meat !">
    </form>
    <form method="post" action="disconnect.php">
        <input class="button" type="submit" value="Deconnexion">
    </form>
    
    
</body>

</html>
