<?php
    if(isset($_POST['choix'])){
        if($_POST['choix']=="entreprise"){
        header('location: ident_entreprise.php');
        }
        else if($_POST['choix']=="prof"){
        header('location: ident_prof.php');
        }
    }
    include 'header.php';
?>


 <div class="col-lg-12">
    <h1  class="col-lg-offset-3 col-lg-6">Bienvenue !</h1>
    </div>
    <div class="content_page">


       <div class="pop">
            <form id="accueil" action="index.php" method="post" class="margin">
                
                    <div class="col-lg-offset-4 col-lg-4"><label class="radio-inline" ><input class='radio' name="choix"  type="radio" value="entreprise">entreprise</label></div><br/>
                    <div class="col-lg-offset-4 col-lg-4"><label class="radio-inline" ><input class='radio' name="choix"  type="radio" value="prof">      professeur</label></div><br/>
                    <br/>
                    <input name="valider" type="submit" class="btn btn-success col-lg-offset-4 col-lg-4 " value="valider"> 
                    <br/>
                
            </form>  
        </div>      
 <?php

 include "footer.php";



