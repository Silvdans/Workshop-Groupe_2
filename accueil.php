<?php

    session_start();
    if (isset($_SESSION['id']) AND isset($_SESSION['name'])){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 





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
              <li>
                <a href="image_ia.php">
                  <img src="assets/img/nyancat.png" style="height:30px">
                  <p>Génération d'image</p>
                </a>
              </li>
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
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary btn-secondary rounded-15" style="background-color:  #6e6e89;" data-toggle="modal" data-target="#exampleModal">
                    Syndrome du canal carpien
                  </button> 

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle">Syndrome du canal carpien</h5>
                          <!-- <button type="button" class="Fermer" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body">
                        Le clavier, qu’il soit configuré en Azerty ou en Qwerty, ne sont pas conçus de manière ergonomique. Conjuguée à l’absence de pauses, son utilisation est responsable de douleurs dans les membres supérieurs. Les premiers symptômes se manifestent dans le cou. En fait, une mauvaise position du corps, des poignets posés sur la table sans support pour les avant-bras provoquent des tensions au niveau du canal carpien à l’origine du syndrome du même nom. En cause également : le manque de formation à la frappe et des problèmes d’ajustement au poste de travail.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary btn-secondary rounded-15" style="background-color:  #6e6e89;" data-toggle="modal" data-target="#exampleModal_coude">
                    Tendinite du coude
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_coude" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle"> Tendinite du coude</h5>
                          <!-- <button type="button" class="Fermer" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body">
                        La manipulation de la souris sollicite les coudes, mais aussi les articulations de l’épaule si celles-ci sont continuellement relevées. À terme, une épicondylite ou tendinite du coude s’installe. Il faudra alors prendre rendez-vous avec un chirurgien spécialiste du coude dès les premiers symptômes pour éviter une intervention.
Lombalgies
Les positions longues et statiques au poste de travail sont la cause de douleurs dans le dos. Se lever souvent est indispensable pour soulager les tensions. Pensez à vous muscler le dos : la natation est bénéfique dans la mesure où elle ne traumatise pas le corps, le stretching également.
Sécheresse oculaire
Le travail sur les écrans fatigue les yeux. Au bout de quelques heures, une sensation de picotement donne l’alerte d’une sécheresse oculaire. Des lunettes spéciales sont recommandées ainsi qu’une bonne hydratation des yeux. Placez également l’ordinateur perpendiculairement à la fenêtre et adaptez l’éclairage. Préférez un écran LCD à surface mate, il évitera les reflets.

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary btn-secondary rounded-15" style="background-color:  #6e6e89;" data-toggle="modal" data-target="#exampleModal_cou">
 Douleurs au cou

                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_cou" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle">Douleurs au cou</h5>
                          <!-- <button type="button" class="Fermer" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body">
                        Les douleurs au cou peuvent être évitées si l’écran de l’ordinateur est positionné au niveau des yeux afin de respecter la position naturelle de la nuque. La distance entre l’œil et l’écran devrait correspondre à celle d’un bras.

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-secondary rounded-15" style="background-color:  #6e6e89;" data-toggle="modal" data-target="#exampleModal_lambal">
Lombalgies

                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_lambal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle">Lombalgies</h5>
                          <!-- <button type="button" class="Fermer" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body">
                        Les positions longues et statiques au poste de travail sont la cause de douleurs dans le dos. Se lever souvent est indispensable pour soulager les tensions. Pensez à vous muscler le dos : la natation est bénéfique dans la mesure où elle ne traumatise pas le corps, le stretching également.

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-secondary rounded-15" style="background-color:  #6e6e89;" data-toggle="modal" data-target="#exampleModal_secheresse">
Sécheresse oculaire

                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal_secheresse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-dark" id="exampleModalLongTitle">Sécheresse oculaire</h5>
                          <!-- <button type="button" class="Fermer" data-dismiss="modal" aria-label="Fermer">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body">
                        Le travail sur les écrans fatigue les yeux. Au bout de quelques heures, une sensation de picotement donne l’alerte d’une sécheresse oculaire. Des lunettes spéciales sont recommandées ainsi qu’une bonne hydratation des yeux. Placez également l’ordinateur perpendiculairement à la fenêtre et adaptez l’éclairage. Préférez un écran LCD à surface mate, il évitera les reflets.

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>




                 <li class="tooltip"><a href="" class="btn">Dysphasie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyschronie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyspraxie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyslexie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Troubles mnésiques</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dyscalculie</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
                 <li class="tooltip"><a href="" class="btn">Dysorthographique</a><span class="tooltiptext">Fonctionnalité à venir</span></li>
             </ul>
          </div>
      </div>
    </div>
    <script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
</script>
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