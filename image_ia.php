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
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    function displayModal(myModal){
        document.getElementById(myModal).style.display = "block";
        captionText = document.getElementById("caption"+myModal);
        console.log(captionText)
        captionText.innerHTML = myModal.slice(0, -7).replaceAll("_", " ").toUpperCase();
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    function removeModal(myModal){
        document.getElementById(myModal).style.display = "none";
        captionText.innerHTML = ""
    }
</script>  
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/generaton_ia.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c146f5f312.js" crossorigin="anonymous"></script>
</head>
<style>
    body{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #4c4c6d;
    }
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
        #myImg {
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 5px;
            border: solid black 4px;
            cursor: pointer;
            transition: 0.3s;
            }

            #myImg:hover {opacity: 0.7;}

            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            }

            /* Caption of Modal Image */
            .caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            }

            /* Add Animation */
            .modal-content, #caption {  
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @keyframes zoom {
            from {transform: scale(0.1)} 
            to {transform: scale(1)}
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

            .close:hover,
            .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
            }
            .form__group {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  width: 50%;
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid #9b9b9b;
  outline: 0;
  font-size: 1.3rem;
  color: #fff;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}
.form__field::placeholder {
  color: transparent;
}
.form__field:placeholder-shown ~ .form__label {
  font-size: 1.3rem;
  cursor: text;
  top: 20px;
}

.form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #9b9b9b;
}

.form__field:focus {
  padding-bottom: 6px;
  font-weight: 700;
  border-width: 3px;
  border-image: linear-gradient(to right, #11998e, #38ef7d);
  border-image-slice: 1;
}
.form__field:focus ~ .form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 1rem;
  color: #11998e;
  font-weight: 700;
}

/* reset input */
.form__field:required, .form__field:invalid {
  box-shadow: none;
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
<div class="form__group field">
  <input type="input" class="form__field" placeholder="Name" name="name" id='text_input' required />
  <label for="name" class="form__label">Veuillez rentrer la phrase :</label>
</div>
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
                                echo '<img id="myImg" src="'.$dir.'/'.$dossier.'/'.$file.'" height="200px" onclick="displayModal(\''.$file.'\')">';
                                echo '<div id="'.$file.'" class="modal">';
                                echo '<span class="close" onclick="removeModal(\''.$file.'\')">&times;</span>';
                                echo '<img class="modal-content" src="'.$dir.'/'.$dossier.'/'.$file.'">';
                                echo '<div class="caption" id="caption'.$file.'"></div>';
                                echo '</div>';                       
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