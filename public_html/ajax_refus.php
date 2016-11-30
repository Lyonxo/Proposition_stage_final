<?php
    //inclusion du modèle
    include("BDD.php");
    $connexion = new BDD('propstage');
    $message = "";
    $ident=$_POST['ident'];
    //faire passer la proposition à 1
    $requete="UPDATE `proposition_stage` SET `et_code`=2 WHERE `prop_num`=$ident";
    $resultats = $connexion->exec($requete);
    echo "</br>tout va bien suppr";
?>
