<?php 
    session_start();
?>
<?php
function connectToBDDWithPDO(){
    $host = "localhost";
    $dbname = "workshop";
    $user = "root";
    $pass = "root";
    $dsn = "mysql:host=$host;dbname=$dbname";
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=workshop; charset=utf8", "root", "root");
        return $bdd;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}
function setVote($theme, $liked){
    $id_user =$_SESSION['id'];
    $bdd = connectToBDDWithPDO();
    if(doesVoteRowExist($theme)){
        $req = $bdd->prepare('UPDATE vote SET liked = :liked WHERE user = :id_user AND theme = :theme');
        $req->execute(array(
            'liked' => $liked,
            'id_user' => $id_user,
            'theme' => $theme
        ));
    }
    else{
        $req = $bdd->prepare('INSERT INTO vote(user, theme, liked) VALUES(:id_user, :theme, :liked)');
        $req->execute(array(
            'id_user' => $id_user,
            'theme' => $theme,
            'liked' => $liked
        ));
    }
}
function doesVoteRowExist($theme){
    $id_user =$_SESSION['id'];
    $bdd = connectToBDDWithPDO();
    $req = $bdd->prepare("SELECT * FROM vote WHERE user = $id_user AND theme = '$theme'");
    $req->execute();
    $result = $req->fetch();
    if($result){
        return true;
    }else{
        return false;
    }
}
function isVoteliked($theme){
    $id_user =$_SESSION['id'];
    $bdd = connectToBDDWithPDO();
    $req = $bdd->prepare("SELECT liked FROM vote WHERE user = $id_user AND theme = '$theme'");
    $req->execute();
    $result = $req->fetch();
    if($result['liked'] == 1){
        return true;
    }else{
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/generaton_ia.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c146f5f312.js" crossorigin="anonymous"></script>
</head>
<style>
    .generated_images{
        display:flex;
        flex-direction:row;
        justify-content: space-between;
        padding: 0;
        margin: 20px;
    }
    .bloc{
        display:flex;
        justify-content: center;

    }
    .picture{
        height: 200px;
    }
    .main_div{
        display:flex;
        flex-direction:column;
    }
    .lds-roller {
        margin: auto;
        background-color:black;
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;        }
        .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #fff;
        margin: -4px 0 0 -4px;
        }
        .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
        }
        .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
        }
        .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
        }
        .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
        }
        .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
        }
        .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
        }
        .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
        }
        .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
        }
        @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        
    }
</style>
<body>
<a href="accueil.php">Précédent</a>
<?php
        if(isset($_POST['submit'])) {
            $input=$_POST['text'];
            $command = escapeshellcmd("python script.py "."\"".$input."\"");
            $message = shell_exec($command);
        }

        if(isset($_POST['theme']) AND isset($_POST['like'])){
            setVote($_POST['theme'], $_POST['like']);
        }
?>

<input id="text_input" type="text" name="text">
<input type="submit" name="submit" value="Valider" onclick='showImagesInAjax()'/>

<div class="main_div">
<?php

function peuplerImages()
{   
    $dir = "img/generated_images";

    // Ouvre un dossier, et liste tous les fichiers
    $div1 = "<div class='bloc'>";
    $div2 = "<div class='generated_images'>";
    $endiv = "</div>";

    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($dossier = readdir($dh)) !== false) {
                if($dossier != '.' && $dossier != '..'){
                    if($sous_dossier = opendir(($dir.'/'.$dossier))){
                        echo "<div style=margin-top:75px>";
                        echo "\n"; 
                        echo  $div1;
                        echo "\n"; 
                            echo strtoupper(str_replace("_"," ",$dossier));
                        echo $endiv;
                        echo "\n"; 

                        echo $div2;
                        echo "\n"; 
                        while (($file = readdir($sous_dossier)) !== false) {
                            if($file != '.' && $file != '..'){
                                echo '<img class="picture" src="'.$dir.'/'.$dossier.'/'.$file.'" alt="image">';
                                echo "\n";                            
                            } 
                        }
                        echo $endiv;
                        echo "\n"; 
                        echo '<div style="text-align:center">';
                        echo "\n"; 
                        if (isVoteliked($dossier)){
                            echo "<i onclick=\"like('$dossier', 0)\" class='fas fa-heart' style='color:red; font-size:50px;'></i>"; 
                        }else{
                            echo "<i onclick=\"like('$dossier', 1)\" class='fa-regular fa-heart' style='color:red; font-size:50px;'></i>"; 
                        }
                        echo $endiv;
                        echo "\n"; 
                        echo $endiv;
                        echo "\n";  
                    }
                    };
                }
            }
            closedir($dh);
        }             
}

peuplerImages()
?>
</div>

</html>
<script>
    
    function showImagesInAjax(){
        $.ajax({
            url: 'image_ia.php',
            type: 'POST',
            data: {
                'submit': 'Valider',
                'text': document.getElementById("text_input").value
            },
            beforeSend: function(){
                $('.main_div').html('<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>')
            },
            success: function(data){
                window.location.reload();
            }
            
        });
    }

    function like(theme, like){
        $.ajax({
            url : 'image_ia.php',
            type : 'POST',
            data:{
                'like':like,
                'theme':theme,
            },
            success: function(data){
                window.location.reload();
            }
        })
    }
</script>