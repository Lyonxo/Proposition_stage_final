<?php
    //initialisation variables
    $message="";
    $nom="";
    $adresse="";
    $result="";
    
    if(!empty($_POST['nom_entreprise']) && !empty($_POST['adresse_entreprise']) && isset($_POST['nom_entreprise']) && isset($_POST['adresse_entreprise']))
    {//vérification si les champs ont bien été remplit
        
        //connexion à la base de données
        include 'header.php';
        include 'BDD.php';
        $connexion=new BDD('propstage');
        
        //les champs ont été vérifiés donc on remplit les variables
        $nom=$_POST['nom_entreprise'];
        $adresse=$_POST['adresse_entreprise'];
        
        //préparation et envoi de la requête
        $requete="Select * from entreprise where ent_nom='$nom' and ent_adresse='$adresse'";
        $result=$connexion->select($requete);
        
        //vérification du résultat
        if($result!=null)
        {
            echo "code :".$result[0]['ent_num'];
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
    <h1  class="col-lg-offset-3 col-lg-6">Accueil Professeur</h1>
    </div>
    <div class="content_page">

     <div class="pop">
         <form id="accueil" action="ident_entreprise.php" method="post" class="margin">
             <br/>
                <input class='btn btn-warning col-lg-offset-4 col-lg-4' type="button" name="button stage 1 "value="propositions de stages" id="propstage"><br><br>
                <input class='btn btn-warning col-lg-offset-4 col-lg-4' type="button" name="button stage 2 "value="stages valider"         id="stageval" ><br><br>
                <input class='btn btn-primary col-lg-offset-4 col-lg-4' type="button" name="button stage 2 "value="deconnexion"            id="deco"     ><br><br>
             <br/>
         </form>
     </div>
            
    
<?php include "footer.php"; ?>


    <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            
            $('#propstage').click(function(){
            //alert("bonjour");
            url = "liste_proposition_stage.php";
            $( location ).attr("href", url);
            });


            $('#stageval').click(function(){
            //alert("bonjour");
            url = "liste_proposition_stage_valides.php";
            $( location ).attr("href", url);
            });


            $('#deco').click(function(){
            //alert("bonjour");
            url = "index.php";
            $( location ).attr("href", url);
            });



             });
               
               </script>      