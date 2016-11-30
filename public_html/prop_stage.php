<?php
    include 'header.php';
?>
    <div class="col-lg-12">
    <h1  class="col-lg-offset-3 col-lg-6">Proposition de stage</h1>
    </div>
    <div class="content_page">
<?php
        $message="";
        $nom="";
        $adresse="";
        $intitulé="";
        $description="";
        $competences="";
        $date="";
        //est redirigé vers index.php si il n'y a pas de retour sur le nom et l'adresse
        
        if(!empty($_POST['nom_ent']) && !empty($_POST['adresse_ent']) && isset($_POST['nom_ent']) && isset($_POST['adresse_ent']))
        {
          
            if(!empty($_POST['intitulé']) && !empty($_POST['description']) && !empty($_POST['competence']))
            {
                include 'BDD.php';
                $connexion=new BDD('propstage');
                
                $nom=addslashes($_POST['nom_ent']);
                $adresse=addslashes($_POST['adresse_ent']);
                $intitule=addslashes($_POST['intitulé']);
                $description=addslashes($_POST['description']);
                $competences=addslashes($_POST['competence']);
                $date= date('Y-m-d H:i:s');
                //appel à la base de données pour récupérer l'id de l'entreprise
                $requete="Select ent_num, ent_ville, ent_codepostal from entreprise where ent_nom='$nom' and ent_adresse='$adresse' ";
                $result=$connexion->select($requete);
                
               // if($result= true)
               // {
                   
                    //echo "code".$result[0]['ent_num'];
                   // echo"ville".$result[0]['ent_ville'];
                    $indice=$result[0]['ent_num'];
                   //$ville=$result[0]['ent_ville'];

               // } 
                    //ensuite enregistrement des données dans la bdd
                    $requete2="insert into proposition_stage (prop_num,ent_num,et_code,prop_intitule,prop_description,prop_competences, prop_date)
                                                       values('','$indice',0,'$intitule','$description','$competences','$date')";
                    $result2 = $connexion->exec($requete2);
                    echo $result2;
                

                    if ($result2 = true){
                        $message = "votre proposition de stage a bien été émise";
                    }
        
                
            }
            /*else
            {
                echo "Veuillez remplir les champs.";
            }*/
        }
    
        //1° version (arrivé sur la page pour la 1° fois)
        elseif(!empty($_GET['nom']) && !empty($_GET['adresse']) && isset($_GET['nom']) && isset($_GET['adresse']))
        {
            $nom=$_GET['nom'];
            $adresse=$_GET['adresse'];
        }
        /*else
        {
            header("location: index.php");
        }*/
            ?>
    
    <div class="pop">
            <form method="post" action="prop_stage.php" class="margin">
            
                <div class="form-group">

                    <div class=" col-lg-12">
                    <label class=" col-lg-offset-4 col-lg-4"><h3><?php echo $message; ?><h3></label>
                    </div>

                    <label class="col-lg-4">Nom de l'entreprise : </label>
                    <div>
                    <input class="form-control" name="nom_ent" type="text" value="<?php echo $nom;?>" ><br/><br/>
                    </div>

                    <label class="col-lg-4">Adresse de l'entreprise : </label>
                    <div>
                    <input class="form-control" name="adresse_ent"type="text" value="<?php echo $adresse;?>" ><br/><br/>
                    </div>

                    <label class="col-lg-4">Intitulé du stage :       </label>
                    <div>
                    <input class="form-control" name='intitulé' id='intitule_test' type="text"/><br/><br/>
                    </div>

                    <label class="col-lg-4">Description du stage :    </label>
                    <div>
                    <textarea class="form-control" name='description' id='description_test'/></textarea><br/><br/>
                    </div>
                   
                    <label class="col-lg-4">Compétences recherchées:  </label>
                    <div>
                    <textarea class="form-control"  name='competence' id='competence_test'/></textarea><br/>
                    </div>
               
                
                    <div>
                    <input type="submit" value="envoyer" class="btn btn-success col-lg-offset-4 col-lg-4" id="vald"/>
                    <br/><br/>
                    <input type="button" value="retour"  class="btn btn-primary col-lg-offset-4 col-lg-4" id="retr"/><br/>
                    </div>
                    
                
                    <br/>
                    <br/>
                    <br/>
                    

                </div>
                </div>
            </form>

   </div> 
</div>

   <?php include "footer.php"; ?>


    <script src="jquery.js"></script>
        <script>

             $(document).ready(function() {

            //*********************************//
            // redirection url                 //
            //*********************************//

            $('#retr').click(function(){
            url = "index.php";
            $( location ).attr("href", url);
            });

            //********************************//
            //verification des champs         //
            //********************************//

            var intitule    = $('#intitule_test');
            var description = $('#description_test');
            var competence  = $('#competence_test');

            $('#vald').click(function(){

            if(intitule.val()=='' && description.val()== '' && competence.val()==''){
            alert('veuillez remplir les champs svp');
            }

                else

                {
                    if(intitule.val() == ''){
                    alert("veuillez remplir le champ Intitule");
                    }

                    if(description.val() == ''){
                    alert("veuillez remplir le champ Description");
                    }

                    if(competence.val() == ''){
                    alert("veuillez remplir le champ Compétences");
                    }

                }

            });   

        });
</script>

           
    
      
 
