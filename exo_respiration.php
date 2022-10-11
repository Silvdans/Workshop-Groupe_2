<!doctype html>
<html lang="fr">
<head>
    
  <meta charset="utf-8">
  <title>Respiration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/exo_respiration.css">
</head>
<body>
        <div class="info">
            <a href="accueil.php" class="lien">
                <div class="previous">
                    <img src="img/previous.png" alt="précédent">
                    <p>Précédent</p>
                </div>
             </a>

            <!-- <img id="imginfo"src="Info.svg"> -->
            <img id="infobulle" src="Infobulle.svg">
        </div>
        <div class="directions">
            <div class="message">Inspirez</div>
            <div class="message">Bloquez</div>
            <div class="message">Expirez</div>
            <div class="message">Bloquez</div>
        </div>  
        <div class="wrapper">
            
            <div class="timer inhale">
                <div class="indicators">
                <div class="indicator"></div>
                </div>
            </div>
            <div class="timer inhale-hold">
                <div  class="indicators">
                <div class="indicator"></div>
                
                </div>
            </div>
            <div class="timer exhale"> 
                <div class="indicators">
                <div class="indicator"></div>
                </div>
            </div>
            <div class="timer exhale-hold">
                <div class="indicators">
                <div class="indicator"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <img id="image" src="undraw_Reading_re_29f8.svg">
    </div>
    <div class="heartContainer">
        <img id="heart"src="Player_Controllers.png" onclick="fillimage()">
    </div>
    
    
    
</body>
</html>

<script>

    image = document.getElementById('image');
    window.setInterval(stopping,4000)
    window.setInterval(running,8000)
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
    
function stopping(){
    image.style.webkitAnimationPlayState = "paused";
}
function running(){
    image.style.webkitAnimationPlayState = "running";
}
var filled = false
function fillimage(){
    if(filled == false)
    {
        document.getElementById('heart').style.backgroundColor ='#B8DFD8';
        filled = true;
    }
    else{
        document.getElementById('heart').style.backgroundColor = '#4C4C6D';
        filled = false;
    }
    
}

</script> 