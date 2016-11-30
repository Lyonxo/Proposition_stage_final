<?php
include "header.php";
    include 'BDD.php';
    $connexion=new BDD('propstage');
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
                where proposition_stage.et_code=0";
    $result = $connexion -> select($requete);
    $max=count($result);
    
            //pour chaque ligne du tableau
            //echo date('d-m-Y H:i:s');
          
            for($i=0;$i<$max;$i=$i+1){
            $cpt = $cpt+1;
            $ligne=$result[$i];
             
            echo "<div class='pop'>".

                "<fieldset class='margin'>".

                 "<legend style='font-weight:bold;'>proposition de stage numéro: ".$ligne['prop_num']."<span class='col-lg-offset-7'>".$ligne['prop_date']."</span></legend>".

                 "<form class='form3' id='liste_prop' action='liste_proposition_stage.php' method='post' class='clo-lg-2'>".

                 "<label> <h4 style='font-weight:bold;'>entreprise: </h4> </label> ".$ligne['ent_nom'].                                                               "<br/>".
                 "<label> <h4 style='font-weight:bold;'>adresse:    </h4> </label> ".$ligne['ent_adresse']." ".$ligne['ent_codepostal']." ".$ligne['ent_ville'].      "<br/>".
                 "<label> <h4 style='font-weight:bold;'>intitulé:   </h4> </label> ".$ligne['prop_intitule'].                                                         "<br/>".

                 "<br/>".

                 "<label> <h4 style='font-weight:bold;'>description:              </h4> </label> <br/> <p>".$ligne['prop_description'].         "</p><br/><br/>".
                 "<label> <h4 style='font-weight:bold;'>competences recherchées : </h4> </label> <br/> <p>".$ligne['prop_competences']."</p><br/><br/>".

                 "<input type='button' class='btn btn-success' id='".$ligne['prop_num']."' value='valider'>".
                 "&nbsp;".
                 "<input type='button' class='btn btn-danger'  id='".$ligne['prop_num']."' value='refuser'><br/>".

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


            
            

            $(':button[value="valider"]').click(function(){
                 alert($(this).val());
                 alert($(this).attr('id'));
                 //alert($(':span').attr('id'));
                
                var ident = $(this).attr('id');
                alert("l'ident");
                alert(ident);
                $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        data: 'ident=' + ident,
                        dataType: 'html',
                        success: function (code_html, statut) {
                            alert(code_html);
                            location.reload(); 
                        },
                        error: function () {
                            alert("marche pas");
                        },
                    });
                

                //url = "liste_proposition_stage.php";
                //$( location ).attr("href", url);
                });
                 
            
                
            $(':button[value="refuser"]').click(function(){
                 alert($(this).val());
                 alert($(this).attr('id'));
                 //alert($(':span').attr('id'));

                var ident = $(this).attr('id');
                alert("l'ident");
                alert(ident);
                $.ajax({
                        url: 'ajax_refus.php',
                        type: 'POST',
                        data: 'ident=' + ident,
                        dataType: 'html',
                        success: function (code_html, statut) {
                            alert(code_html);
                            location.reload(); 
                        },
                        error: function () {
                            alert("marche pas");
                        },
                    });
                
                 
            });

            $('#retr').click(function(){
                //alert("bonjour");
                url = "accueil_prof.php";
                $( location ).attr("href", url);
            });

});
                
           

     
         </script>  


