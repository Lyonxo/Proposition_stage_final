<?php
    $message="";
    $nom="";
    $adresse="";
    $result="";
    
    if(!empty($_POST['nom_entreprise']) && !empty($_POST['adresse_entreprise']) && isset($_POST['nom_entreprise']) && isset($_POST['adresse_entreprise']))
    {//vérification si les champs ont bien été remplit
        
        //connexion à la base de données
        include 'BDD.php';
        $connexion=new BDD('propstage');
        
        //les champs ont été vérifiés donc on remplit les variables
        $nom=addslashes($_POST['nom_entreprise']);
        $adresse=addslashes($_POST['adresse_entreprise']);
        
        //préparation et envoi de la requête
        $requete="Select * from entreprise where ent_nom='$nom' and ent_adresse='$adresse'";
        $result=$connexion->select($requete);
        //vérification du résultat
        if($result!=null)
        {
            //echo "code :".$result[0]['ent_num'];
            header("location: prop_stage.php?nom=$nom&adresse=$adresse");   
        }
        else
        {
            header("location: insc_entreprise.php");
        }
    }
    else
    {
        $message ="Valeurs non rentrées";
    }

    include "header.php";
?>

    <div class="col-lg-12">
    <h1  class="col-lg-offset-3 col-lg-6">Identification Entreprise</h1>
    </div>
    <div class="content_page">

    
   <div class="pop">
        <form id="accueil"  method="post" class="margin form-inline">
            <div class="col-lg-offset-5 ">
                <div class="form-group"> 
                    <label class="col-lg-6">nom de l'entreprise:</label>
                    <input class='form-control  col-lg-6' id="log" type="text" name="nom_entreprise">
                <div>
                <br/>
                <div class="form-group">
                    <label class="col-lg-6">adresse :</label>
                    <input class='form-control  col-lg-6' id="mdp" type="text" name="adresse_entreprise">     
                </div>
            </div>
            <br/>
            <input type="submit" name="valider" value="valider" id="val" class='btn btn-success col-lg-6' /><br>
        </form>
    </div>

<?php 
include "footer.php";
?>
<script src="jquery.js"></script>
<script>
  $(document).ready(function() {

            var nom = $('#log');
            var adresse = $('#mdp')
            
            $('#val').click(function(){

            if(nom.val()=='' && adresse.val() == ''){
            alert('veuillez remplir les champs svp');
            }

            else

            {
                if(nom.val() == ''){
                alert(" veuillez remplir le champ nom");
                }

                if(adresse.val() == ''){
                alert("veuillez remplir le champ adresse");
                }
            }

            });   

        });
</script>