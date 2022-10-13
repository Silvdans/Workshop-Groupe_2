<?php
function connectToBDDWithPDO(){
    echo "test";
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=workshop; charset=utf8", "root", "root");
        return $bdd;
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
} 
function peuplerThemeInBDD(){
    
    $dir = "img/generated_images";
    $bdd = connectToBDDWithPDO();
    $req = $bdd->prepare("DELETE FROM theme");
    $req->execute();
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($dossier = readdir($dh)) !== false) {
                if($dossier != '.' && $dossier != '..'){
                    $req = $bdd->prepare("INSERT INTO theme (name) VALUES ('$dossier')");
                    $req->execute();
                }
            }
            closedir($dh);
        }   
    }          
   
}
connectToBDDWithPDO();
peuplerThemeInBDD();
?>