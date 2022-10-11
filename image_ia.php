<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/generaton_ia.css" />
    
</head>
<body>

<?php
        if(isset($_POST['submit'])) {
            $input=$_POST['text'];
            $command = escapeshellcmd("python script.py "."\"".$input."\"");
            $message = shell_exec($command);
        }
    ?>
<form method="post">
    <input type="text" name="text">
    <input type="submit" name="submit" value="Valider"/>
</form>

<div class="generated_images">
<?php
$dir = "img/generated_images";

// Ouvre un dossier, et liste tous les fichiers
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($dossier = readdir($dh)) !== false) {
            if($dossier != '.' && $dossier != '..'){
                if($sous_dossier = opendir(($dir.'/'.$dossier))){
                    while (($file = readdir($sous_dossier)) !== false) {
                        if($file != '.' && $file != '..'){
                            echo '<img src="'.$dir.'/'.$dossier.'/'.$file.'" alt="image">';
                        }
                    }
                }
                
                }
            }
        }
        closedir($dh);
    }
?>
<div>

</html>