<?php

try{
  $bdd = new PDO ("mysql:host=localhost;dbname=workshop; charset=utf8", "root", "root");
}
catch(PDOException $e){
  die('Erreur : '.$e->getMessage());
}

if($bdd === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
$mail = $_POST['mail'];

$req = $bdd->prepare('SELECT id, name, mail, password FROM users WHERE mail = :mail');

$req->execute(array('mail' => $mail));

$resultat = $req->fetch();


if (!$resultat)
{
    header('Location: index.php');;
}
else
{
    if (sha1($_POST['password'])== $resultat['password'] ) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['name'] = $resultat['name'];
        header('Location: accueil.php');
    }
    else {
        header('Location: index.php');
    }
}

  

?>
