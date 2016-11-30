<?php
include 'header.php';
?>
<div class="col-lg-12">
<h1  class="col-lg-offset-3 col-lg-6">Inscription entreprise</h1>
</div>
<div class="content_page">
<?php
   
    include 'BDD.php';
    $connexion=new BDD('propstage');

    $requete ="";

    $nom_entreprise="";
    $adresse_entreprise="";
    $ville="";
    $code_postal="";
    $fonction="";
    $nom_correspondant="";
    $telephone="";
    $adresse_mail="";
    $fonction="";

    $message="";

if(isset($_POST['nom_entreprise']))
{

    $nom_entreprise      =$_POST['nom_entreprise'];
    $adresse_entreprise  =$_POST['adresse_entreprise'];
    $ville               =$_POST['ville'];
    $code_postal         =$_POST['code_postal'];
    $fonction            =$_POST['tp_code'];
    $nom_correspondant   =$_POST['nom_correspondant'];
    $telephone           =$_POST['telephone'];
    $adresse_mail        =$_POST['adresse_mail'];


    if ($message=="")
    {
         
        $requete="insert into entreprise ( ent_num, ent_nom, ent_adresse, ent_ville, ent_codepostal, ent_nom_correspondant, ent_tel,  ent_mail, tp_code) values ('','$nom_entreprise','$adresse_entreprise','$ville','$code_postal','$nom_correspondant','$telephone','$adresse_mail','$fonction')";

                  
        //$requete2= "select * from type;";               


        
        //echo $resultats;
        //echo $requete;
        //echo $message;
    /*
        try 
        {
            // permet d'inserer une ligne
            $resultats2 = $connexion->select($requete2);
        }    
        catch (PDOException $e) 
        {
            $message = $message."probleme pour executer cette requete $requete : ";
            $message = $message."les valeur existe deja dans la base de données";
            //echo $message;
        }
        echo $requete2;
        echo $message;
        $max=count($resultats2);*/
    }

    
    

}

 
?>
  <!Doctype html>

    
    
      <div class="pop">
            <form method="post" action="insc_entreprise.php" class="margin">
            
            <div class="form-group">

                <div>
                <label class='col-lg-4'>Nom Entreprise      </label>
                <input class='form-control' type="text"  id='nom'     name='nom_entreprise'      /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>Adresse Entreprise  </label>
                <input class='form-control' type="text"  id='adresse' name='adresse_entreprise'  /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>ville               </label>
                <input class='form-control' type="text"  id='ville'   name="ville"               /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>code postale        </label>
                <input class='form-control' type="text"  id='codep'   name="code_postal"         /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>fonction</label> 
                <select name='tp_code' class='form-control'>
                <?php
                        $requete2= "select * from type;";
                    
                    try 
                    {
                        // permet d'inserer une ligne
                        $resultats2 = $connexion->select($requete2);
                    }    
                    catch (PDOException $e) 
                    {
                        $message = $message."probleme pour executer cette requete $requete : ";
                        $message = $message."les valeur existe deja dans la base de données";
                        //echo $message;
                    }
                    //echo $message;
                    $max=count($resultats2);
                    
                    for($i=0;$i<$max;$i=$i+1)
                    {
                        $ligne=$resultats2[$i];
                        echo "<option value=",$ligne['tp_code'],">",$ligne['tp_libelle'],"</option>";
                    }
                ?>
                </select>
                </br></br>
                 </div>

                <div>
                <label class='col-lg-4'>nom du correspondant  </label>
                <input class='form-control' type="text"  id='correspondant' name="nom_correspondant"     /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>telephone            </label>
                <input class='form-control' type="text"  id='telephone'     name="telephone"             /></br></br>
                </div>

                <div>
                <label class='col-lg-4'>adresse e-mail       </label>
                <input class='form-control' type="text"  id='mail'          name="adresse_mail"          /></br></br>
                </div>

                <div>
               <input type="button" name="valider" value="valider" class='btn btn-success col-lg-offset-4 col-lg-4' id="vald"/><br/><br/>
               </div>

                


            </div>
    </div>

            </form>
    </body>
</html>


<script src="jquery.js"></script>
<script>
  $(document).ready(function() {

            var nom           = $('#nom'); 
            var adresse       = $('#adresse'); 
            var ville         = $('#ville');
            var codep         = $('#codep');
            var correspondant = $('#correspondant');
            var telephone     = $('#telephone');
            var mail          = $('#mail');

            
            $('#vald').click(function(){
            

            if(nom.val()=='' || adresse.val() == '' || ville.val() == '' || codep.val() == '' || correspondant.val() == '' || telephone.val() == '' || mail.val() == ''){
            alert('veuillez remplir les champs svp');
            }
            else
            {
                
                <?php
                try 
                {
                    // permet d'inserer une ligne
                    $resultats = $connexion->exec($requete);
                ?>

                alert("votre inscription a bien été prise en compte");
                 url = "prop_stage.php";
                $( location ).attr("href", url);
                <?php

                } 
                catch (PDOException $e) 
                {
                    $message = $message."probleme pour executer cette requete $requete : ";
                    $message = $message."les valeur existe deja dans la base de données";
                    //echo $message;
                }
                ?>

                
            }

            });   

        });
</script>