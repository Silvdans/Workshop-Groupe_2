<?php

    session_start();
    if (isset($_SESSION['id']) AND isset($_SESSION['name'])){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="css.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Accueil</title>
</head>
<body>

    <div id="container">
      <img id="logo" src="D:\EPSI\HTML\Workshop\assets\img\logo.png" alt="">
        <div id="zone1">
          <div id="rectangle">
            <div class="titre">
              <h2>Mon état de concentration</h2>
              <h3>Comment-vous sentez vous ? </h3>
            </div>
            <div id="moods">
              <div class="select" id="mood_concentre">
                <img src="assets/img/Star-struck.png" alt="Focused" style="z-index: -9999">
                <p>Concentré</p>
              </div>


              <div class="select" id="mood_deborde">
                <img src="assets/img/Exploding head.png" alt="Busy">
               <p>Distrait</p>
              </div>
              <div class="select" id="mood_endormi">
                <img src="assets/img/Sleeping face.png" alt="Sleeping">
                <p>Endormi</p>
              </div>
              <div class="select" id="mood_enerve">
                <img src="assets/img/Pouting face.png" alt="Angry">
                                   <p>Énervé</p>
              </div>
              <div class="select" id="mood_stresse">
                <img src="assets/img/stressedOut.png" alt="Stressed Out">
                  <p>Stressé</p>
              </div>

              <div id="boxmood_concentre" class="box">
                <p>C'est bien !</p>
              </div>
              <div id="boxmood_deborde" class="box">
                <p>Vous avez l'air distrait essayez un exercice de concetration </p>
              </div>
              <div id="boxmood_endormi" class="box">
                <p>Vous avez l'air fatigué essayez un exercice de boost</p>
              </div>
              <div id="boxmood_enerve" class="box">
                <p>Vous avez l'air énervé essayez un exercice de relaxation</p>              </div>
              <div id="boxmood_stresse" class="box">
                <p>Vous avez l'air stressé essayez un exercice de respiration <br><br><br> <a href="exo_respiration" class="v"> Respiration carré</a></p>
              </div>
            </div>
          </div>

          <div id="rectangle2">
            <div class="profil_container">
              <div class="profil_titre">
                  <h2>
                    <?php if (isset($_SESSION['id']) AND isset($_SESSION['name'])){
                              echo 'Bonjour ' . ucfirst($_SESSION['name']);}
                    ?>
                  <h2>
              </div>
              <div class="profil_logo">
                <img src="assets/img/profil.png" alt="" width="72px" >
              </div>

              <div class="profil_actions">
                <div class="settings tooltip">
                  <img src="assets/img/settings.png" width="32px" alt="" style="border-radius:50px; margin-right: 40px;">
                  <span class="tooltiptext">Fonctionnalité à venir</span>
                </div>
                <div class="notif">
                	<a href="" class="notifier tooltip">
                  <img src="assets/img/notif.png" width="32x" alt="" style="border-radius:50px">
                  <span class="tooltiptext">Fonctionnalité à venir</span>
                  </a>
                </div>

                <div class="logout">
                  <a href="logout.php">
                    <img src="assets/img/logout.png" width="32px" alt="" style="border-radius:50px; margin-left: 40px;">
                  </a>  
                </div>
              </div>

            </div>

          </div>
        </div>
        <div id="zone2">


        <div class="advices">
          <h3>Mes exercices conseillés</h3>
            <ul>
              <a href="exo_concentration.php">
                  <li>
                    <img src="assets/img/brain.png" alt="">
                        <p>Concentration</p>
                  </li>
              </a>  
              <a href="exo_respiration.php">   
                  <li>
                      <img src="assets/img/cloud.png" alt="">
                      <p>Respiration</p>  
                 </li>
              </a>   
              <a href="exo_relax.php">
                <li>
                    <img src="assets/img/leaf.png" alt="">
                    <p>Relaxation</p>
                 </li>
              </a>  
              <a href=""  class="tooltip"> 
                <li class="keurk">
                  <img src="assets/img/heart.png" alt="" class="keur">
                  <p>Favoris <br></p> 
                  <span class="tooltiptext">Fonctionnalité à venir</span> 
                </li>
              </a>
            </ul>
        </div>

<img src="assets/img/yoga.svg" width="100px">



        <div class="favorites">
            <h3>Rechercher un exercice</h3>
             <ul>
                 <li class="tooltip"><a href="" class="btn">Dysgraphie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dysphasie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyschronie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyspraxie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyslexie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Troubles mnésiques</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyscalculie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dysorthographique</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li><a href="screen.php" class="btn">TDAH</a></li>
             </ul>
          </div>
      </div>
    </div>
<script>
var click = 0;
$( "#boxmood_concentre" ).hide();
$( "#boxmood_deborde" ).hide();
$( "#boxmood_endormi" ).hide();
$( "#boxmood_enerve" ).hide();
$( "#boxmood_stresse" ).hide();
  $( ".select" ).click(function(event) {
    if (click == 0) {
      click = 1;
      $( "#mood_concentre" ).hide();
      $( "#mood_deborde" ).hide();
      $( "#mood_endormi" ).hide();
      $( "#mood_enerve" ).hide();
      $( "#mood_stresse" ).hide();
      $( "#boxmood_concentre" ).hide();
      $( "#boxmood_deborde" ).hide();
      $( "#boxmood_endormi" ).hide();
      $( "#boxmood_enerve" ).hide();
      $( "#boxmood_stresse" ).hide();
      $( "#box" + event.target.id ).show();
      $( "#" + event.target.id ).show();
      $( "#box" ).show();
    }
    else
    {
      click = 0;
      $("#" + event.target.id).hide();
      $( "#boxmood_concentre" ).hide();
      $( "#boxmood_deborde" ).hide();
      $( "#boxmood_endormi" ).hide();
      $( "#boxmood_enerve" ).hide();
      $( "#boxmood_stresse" ).hide();
      $( "#mood_concentre" ).show();
      $( "#mood_deborde" ).show();
      $( "#mood_endormi" ).show();
      $( "#mood_enerve" ).show();
      $( "#mood_stresse" ).show();
      $( "#box" ).hide();
    }


    //console.log(event.target.id);
  });




<?php
  }else{
    header('Location: index.php');
  }
 ?>


</script>
</body>
</html>
