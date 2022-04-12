<?php 
session_start();
require '../autoload.php';
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pharmacie-Plus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../../images/log1.png">
        <!--bootstrap et css-->
        <link rel="stylesheet" href="../../vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../../vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../../vendors/jqvmap/dist/jqvmap.min.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <!-- jquery -->
        
        <script src="../../vendors/jquery/dist/jquery.min.js"></script>
        <script src="../../vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/script.js"></script>
        
        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<div class="row" id="imp">
                  <div class= "col-md-3"></div>
                  <div class= "col-md-6" style="background-color:white;">
                        <div class="row" style="background-color:#18d26e;">
                              <img src="../../images/log1.png" style="width:5%;">
                              <h3 style="font-family:lucida;font-style:bold-italic;color:white;">Bon De Commande</h3>
                        </div>
                  <div class="row">
                          <form method="GET">
                              <h5 style="font-family:Lucida;font-style:bold-italic;"> 
                                  <?php
                                   $z = new RecupPatient();
                                   $donnee= $z->commande_par_id($_GET['commande']);
                                   $data = $z->tous_les_patients_par_id($_GET['id']);
                                      foreach ($data as $r):?>
                                           <div class="row" >
                                           <div class="col-md-3"></div>
                                           <div class="col-md-6"><span class="text-left" style="font-family: URW Palladio;">INFORMATIONS SUR LA COMMANDE</span></div>
                                           <div class="col-md-3" ></div>
                                            </div>
                                        <br /> 
                                          <div>
 
                                     <div class="col-md-6 text-left" style="border:1px solid;margin-left:5px;float:left;">
                                    		    <div class="row">
                                            		<div class="col-md-6"><i>Noms et Prenoms:</i></div>
                                            		<div class="col-md-6"><b><?php echo ''.$r->get_nom().''.$r->get_prenom();?></b></div>
                                           		 </div>
                                        		<div class="row">
                                                        <div class="col-md-6"><i>Telephone</i></div>
                                                        <div class="col-md-6"><b><?php echo $r->get_tel();?></b></div>
                                        	   </div>
                                      				<div class="row">
                                                <div class="col-md-6"><i>Email:</i></div>
                                                <div class="col-md-6"><b><small><?php echo $r->getAdresse()['0']->get_email();?></small></b></div>
                                			     	  </div>
                                      			<div class="row">
                                                      <div class="col-md-6"><i>Adresse:</i></div>
                                                      <div class="col-md-6"><small><b><?php echo $r->getAdresse()['0']->get_lieu_dit().'-'.$r->getAdresse()['0']->get_quartier().'-'.$r->getAdresse()['0']->getCommunes()->get_commune().'-'.$r->getAdresse()['0']->getCommunes()->getVilles()->get_ville().'-'.$r->getAdresse()['0']->getCommunes()->getVilles()->getRegions()->get_region().'-'.$r->getAdresse()['0']->getCommunes()->getVilles()->getRegions()->getPays()->get_pays();?></b></small></div>
                                      			</div>
	                                   </div>
                                      <img src="../../images/log1.png" style="width:15%;margin-left:120px;">
	                                 <div class="col-md-6 " style="float:right;">
                                    	      <div class="row">
                                            		<div class="col-sm-6 "><i>Numero reference:</i></div>
                                            		<div class="col-md-6 text-danger"><b><?php echo $_GET['reference']; ?></b></div>
                                            </div>
                                            <div class="row">
                                            		<div class="col-sm-6"><i>Date:</i></div>
                                            		<div class="col-sm-6"><b><?php echo $donnee['0']->getDate_com(); ?></b></div>
                                            </div>
                                              <?php if($donnee['0']->getLivre()===0){?>
                                        		<div class="row">
                                              		<div class="col-sm-6"><i>Livraison:</i></div>
                                              		<div class="col-md-6 text-danger"><b><?php echo 'NON'; ?></b></div>
                                              </div>
                                            <?php }?>
                                            <?php if($donnee['0']->getLivre()===1){?>
                                            <div class="row">
                                            		<div class="col-md-6"><i>Livraison:</i></div>
                                            		<div class="col-md-6 text-success"><b><?php echo 'OUI'; ?></b></div>
                                            </div>
                                             <?php }?>
                                               <br />
                                        <div class="row"></div>
                                        <?php $date=getdate();
                                        //echo " {$date["weekday"]} {$date["mday"]} {$date["month"]} {$date["year"]}";?>
	                                       	</div>
			             </form>
              </div>
                    <div class= "col-md-3"></div>
          </div>
               <div class="row">
                        <div style="background-color:#18d26e;width:100%;margin-top:5px;text-align:center;"><h4 style="color:white;font-family:lucida;">Mes Produits</h4></div>
                                <div class="col-md-6"><button type="button" class="btn btn-outline-info btn-sm" onclick="showtextarea()" id="consulter">Modifier la commande<i class='fa fa-download'></i></button>
        		              </b></div>
                          <?php if (!is_null($donnee['0']->getNote())){?>
                                        <div id="produits"   class="panel panel-default" style="margin-left:20px;">
                                          <span><h4><small>listes des produits</small></h4></span>
                                                  <div class="panel-body">
                                                      <b><?php echo '<pre>'.$donnee['0']->getNote().'<pre>';?></b>
                                                        </div>
                                        </div>  
                                            <?php }?>
 
                                                <?php if(!is_null($donnee['0']->getOrdonnance())){?>
                                                    <div id="produits"   class="panel panel-default" style="margin-left:20px;">
                                                        <span><h4><small>Ordonnance</small></h4></span>
                                                                <div class="panel-body">
                                                                  <b><a href="../../upload/upload.php">Telecharger  L'ordonnance&nbsp;<i class="fa fa-upload"></i><?php  $_SESSION['image']= $donnee['0']->getOrdonnance()  ;?></a></b>
                                                                </div>
                                                    </div>  
                                                <?php }?>
            		
            				</div>
            		<div>
               <button type="button" class="btn btn-success btn-sm " id="commenter" style="margin:5px;" onclick="textcomment()"><a href="#" style="color:white;">Commenter <i class='fa fa-comment-o'></i></a></button>
               <button type="button" class="btn btn-primary btn-sm " id="imprimer" style="margin:5px;" onclick="textimprimer()"><a href="#" style="color:white;">Imprimer <i class='fa fa-paperclip'></i></a></button>
                   </div>
                    <div> 
                        <div class="col-md-12" id="fa-sort"> <i class="fa fa-sort-up pull-right" id="fa"></i></div>
                        <textarea rows="10" cols="100" id="textecommenter" placehoder="saisir votre commentaire..."></textarea>
                        <button type="button" class="btn btn-success btn-sm pull-right" id="envoyer" style=""><a href="#" style="color:white;">Envoyer<i class='fa  fa-location-arrow'></i></a></button>
                    </div>
                        <br />
                            <div class="row text-info" style="border-top:1px solid;font-family:lucida;margin:20px;"><i>Bon De Commande  </i> </div>
                              <?php endforeach;?>
