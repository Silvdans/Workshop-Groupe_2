<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respirez</title>
    <link rel="stylesheet" href="https://essential.audio/css/_fonts.css" />
    <link rel="stylesheet" href="essential_audio.css" />
    <script src="essential_audio.js"></script>
    <link rel="stylesheet" href="css/exo_relax.css" />
        

</head>
<body>
    <section class="container">

        <div class="info">
            <a href="accueil.php" class="lien">
                <div class="previous">
                    <img src="img/previous.png" alt="précédent">
                    <p>Précédent</p>
                </div>
             </a>
            <div>
                <img id="imginfo"src="Info.svg">
                <img id="infobulle" src="Infobulle.svg">
            </div>
            
        </div>

        <div class="exo"> 
            <div id="zen" class="zen">
                <img src="img/Bulle.png" alt="nuage">
            </div>
        </div>    

        <div class="cls"></div>

        <div style="display: flex; justify-content: center">
            <div class="title">
                <h1>Focus</h1>
                <p>Avant exam</p>
            </div>
        </div>

        <div class="control">
            <div onclick="myFunction()" id="player_box">               
                <div class="essential_audio" data-url="audio/audio.mp3"><span class="no_js">Please activate JavaScript for the audio player.</span></div>
            </div>
        </div>

    </section>
    <script>
        div = document.getElementById('info');

        document.getElementById("imginfo").addEventListener("mouseover", mouseOver);
        document.getElementById("imginfo").addEventListener("mouseout", mouseOut);  

        function mouseOver() {  
    console.log('over') 
    document.querySelector("#infobulle").style.opacity = 1; 
}  
         
function mouseOut() {   
    console.log('out')
    document.querySelector("#infobulle").style.opacity = 0; 
}
        function myFunction() {
            var element = document.getElementById("zen");

            if(element.classList.contains("anim")){
                element.classList.remove("anim");

            }else{

            element.classList.add("anim");

            }
        }


    </script>
</body>
</html>