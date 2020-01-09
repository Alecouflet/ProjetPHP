<?php session_start();?>
<link rel="stylesheet" href="nextprofile.css" />
<?php
$bdd = new PDO('mysql:host=192.168.65.194; dbname=skoolmeat; charset=utf8', 'root', 'root');

$_SESSION['idstranger'] += 1;
$id = $_SESSION['idstranger'];
$requser = $bdd->prepare("SELECT * FROM user WHERE id_user = ?");
$requser->execute(array($id));
$userexist = $requser->rowCount();
$userinfo = $requser->fetch();
if ($userexist == 0) {
    echo "Pas d'utilisateur";
    $_SESSION['idstranger'] += 1;
    ?><form method="post" action=""><input type="submit" value="Réessayer"></form><?php 
}
if($userexist == 1){
    echo "Utilisateur trouvé!"
    ?><form method="post" action="swipe.php"><input class="button" type="submit" value="Next"></form><?php 
}
?>