<?php
    include 'BDD.php';
    $connexion=new BDD('propstage');
    include "header.php";
    ?>
    
    <div class="col-lg-12">
    <h1  class="col-lg-offset-3 col-lg-6">liste des stages proposés</h1>
    </div>
    <div class="content_page">
    <?php
    //initialisation variables
   
    $requete ="select * from 
                proposition_stage 
                inner join 
                entreprise
                on
                entreprise.ent_num = proposition_stage.ent_num
                where proposition_stage.et_code=1";
    $result = $connexion -> select($requete);
    $max=count($result);
    
            //pour chaque ligne du tableau
            for($i=0;$i<$max;$i=$i+1){
            $ligne=$result[$i];

            echo "<div class='pop'>".

                "<fieldset class='margin'>".

                 "<legend>proposition de stage numéro: ".$ligne['prop_num']."</legend>".

                 "<form class='form3' id='liste_prop' action='liste_proposition_stage.php' method='post' class='clo-lg-2'>".

                 "<label style='font-weight:bold;'>entreprise: </label> ".$ligne['ent_nom'].                                                               "<br/>".
                 "<label style='font-weight:bold;'>adresse:    </label> ".$ligne['ent_adresse']." ".$ligne['ent_codepostal']." ".$ligne['ent_ville'].      "<br/>".
                 "<label style='font-weight:bold;'>intitulé:   </label> ".$ligne['prop_intitule'].                                                         "<br/>".

                 "<br/>".

                 "<label style='font-weight:bold;'>description:              </label><br/><p>".$ligne['prop_description'].         "</p><br/><br/>".
                 "<label style='font-weight:bold;'>competences recherchées : </label><br/><p>".$ligne['prop_competences']."</p><br/><br/>".

                 "</form>".

                 "</fieldset>".

                 "</div>".

                 "<br/>".

                 "<br/>";
                
            } 
            ?>
            <input type="button" value="retour"  class="btn btn-primary col-lg-offset-4 col-lg-4" id="retr"/>
            </div>
            <?php

            //$updt= "UPDATE `proposition_stage` SET `et_code`= '1' WHERE ".$ligne['prop_num']." = prop_num;";          

    include "footer.php";
?>

 
       <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            
            $('#retr').click(function(){
            //alert("bonjour");
            url = "accueil_prof.php";
            $( location ).attr("href", url);
            });



             });
               
               </script>      