<?php
    //initialisation variables
    $message="";
    $login="";
    $mdp="";
    $result="";
    
    if(isset($_POST['login']) && ($_POST['mdp']))
    {//vérification si les champs ont bien été remplit
        
        //connexion à la base de données
        include 'BDD.php';
        $connexion=new BDD('propstage');
        
        //les champs ont été vérifiés donc on remplit les variables
        $login=addslashes($_POST['login']);
        $mdp=addslashes($_POST['mdp']);

        
        //préparation et envoi de la requête
        $requete="Select * from professeur where prof_login='$login' and prof_mdp='$mdp';";
        $result=$connexion->select($requete);
        
        //vérification du résultat
        if(isset($result[0]))
        {
            //$message ='gg';
            header("location: accueil_prof.php");
        }      
}
  include 'header.php';
?> 

    <div class="col-lg-12">
    <h1  class="col-lg-offset-3 col-lg-6">Identification Professeur</h1>
    </div>
    <div class="content_page">
    
         <div class="pop">
             <form id="accueil"  method="post" class="margin form-inline">
                <div class="col-lg-offset-5">
                    <div class="form-group"> 
                        <label class="col-lg-6">login:</label>
                        <input class='form-control  col-lg-6' id="log"type="text" name="login">
                        <br/>
                        <label class="col-lg-6">mot de passe:</label>
                        <input class='form-control  col-lg-6' id="mdp"type="password" name="mdp">     
                   </div>
                </div>
               <br/>
               <input type="submit" name="valider" value="valider" class='btn btn-success col-lg-offset-4 col-lg-4' id="vald"/><br>
            </form>
        </div>

<?php include "footer.php"; ?>

    
        <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            var logintest= $('#log');
            var mdptest = $('#mdp');

            $('#vald').click(function(){
            if(logintest.val()=="" || mdptest.val()== ""){
                alert("remplissez les champs");
            }
            });


                               

             });


        </script>