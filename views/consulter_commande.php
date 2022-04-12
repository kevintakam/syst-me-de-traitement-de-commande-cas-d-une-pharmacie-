<?php 
session_start();
require '../autoload.php';
?>
   <?php $e = new Envoyerdonnee();?>
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
        <script type="text/javascript" src="../../assets/js/script.js"></script>
        
        
        
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
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
                                   static $idcom ;
                                   static $idpat;
                                   static $ref;
                                   if(isset($_GET['commande']))
                                       $com = $_GET['commande'];
                                   else 
                                       $com = $_GET['idcom'];
                                   
                                   if (isset($_GET['id'])) {
                                       $pat =  $_GET['id'];
                                   }else {
                                       $pat = $_GET['idpat'];
                                   }
                                   
                                   if (isset($_GET['reference'])) {
                                       $pa =  $_GET['reference'];
                                   }else {
                                       $pa = $_GET['ref'];
                                   }
                                   $donnee= $z->commande_par_id($com);
                                   $data = $z->tous_les_patients_par_id($pat);
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
                                            		<div class="col-md-6"><b><?php echo ''.$r->get_nom().''.$r->get_prenom();
                                            		$idpat = $r->get_id();
                                            		?></b></div>
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
                                            		<div class="col-md-6 text-danger"><b><?php echo  $pa;?></b></div>
                                            	</div>
                                           	   <div class="row">
                                            		<div class="col-sm-6"><i>Date Soumission:</i></div>
                                            		<div class="col-sm-6"><b><?php echo $donnee['0']->getDate_com(); 
                                            		$idcom = $donnee['0']->getId();
                                            		$ref = $donnee['0']->getRef();
                                            		
                                            		?></b></div>
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
                                        <div class="row">
                                        <div class="col-md-6"><i>statut:</i></div>
                                        <?php if($donnee['0']->getStatus()==='rejette'){?>
                                            		<div class="col-md-6 text-danger"><b><?php echo $donnee['0']->getStatus(); ?></b></div>
                                            		<?php }else{?>
                                            		    <div class="col-md-6 text-success"><b><?php echo $donnee['0']->getStatus(); ?></b></div>
                                            		<?php }?>
                                        </div>
                                        <?php 
                                        
                                        $date=getdate();
                                        echo " {$date["weekday"]} {$date["mday"]} {$date["month"]} {$date["year"]}";?>
	                        </div>
			             </form>
             	</div>
                    <div class= "col-md-3"></div>
          </div>
                    <div> 
                    <div style="background-color:#18d26e;width:100%;margin-top:5px;text-align:center;"><h4 style="color:white;font-family:lucida;">Mes Produits</h4></div>
                    
                    <ul class="nav nav-pills nav-justified mb-3 mt-2" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" onclick="showtextarea()" id="consulter">Consulter  <i class='fa fa-download'></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab"  data-toggle="modal"  href="#monModal" role="tab" aria-controls="pills-profile" aria-selected="false" >commenter</a>
                                    </li>
                                 
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" onclick="detail()">Actions</a>
                                    </li>
                                </ul>
                                
                          <?php 
                          $array= array();
                          if (!is_null($donnee['0']->getNote())){?>
                                        <div id="produits"   class="panel panel-default" style="margin-left:20px;">
                                          <span><h4><small>listes des produits</small></h4></span>
                                                  <div class="panel-body" style="border:none;">
                                                      <b><?php echo $array='<pre>'.$donnee['0']->getNote().'<pre>';?></b>
                                                        </div>
                                        </div>  
                                            <?php }?>
 
                                                <?php if(!is_null($donnee['0']->getOrdonnance())){?>
                                                    <div id="produits"   class="panel panel-default" style="margin-left:20px;">
                                                        <span><h4><small>Ordonnance</small></h4></span>
                                                                <div class="panel-body">
                                                                  <b><img src="../../upload/<?php echo $donnee['0']->getOrdonnance();?>" style="width:300px;"><?php  $_SESSION['image']= $donnee['0']->getOrdonnance()  ;?></a></b>
                                                                </div>
                                                    </div>  
                                                <?php }?>
            </div>
            <div id="traiter">
          <div class="card-body">
          								<?php  $p = new RecupPatient();
          								      
          								?>
										<form action="../commande.php" method="get">
										<input type="hidden" value = "<?= $idcom?>" name="idcom">
										<input type="hidden" value = "<?= $idpat?>" name="idpat">
										<input type="hidden" value = "<?= $ref?>" name="ref">
										<button   class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#monModal">Valider la commande</button>
										                           <div id="monModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h2 class="modal-title text-danger" style="text-align:center;font-family:lucida;">Suppression</h2>
                        </div>
                		<div style="text-align:center;" class="text-danger"><i class="fa  fa-ban fa-4x"></i></div>
               			 <div class="modal-body">
                           	<div style="text-align:center;font-family:lucida;"><h3><b>Etes vous sur de vouloir rejetter cette commande?</b></h3></div>
                       </div>
                       
            			<div class="modal-footer">
            			
                			<button type="submit"  class="btn btn-danger"  id="oui" ><a style="color:white;">OUI</a></button>
                			<button  class="btn btn-info" data-dismiss="modal" id="non">NON</button>    
            			</div>
           	</div>
        </div>
    </div>
											
										</form>
										
										<form action="../commande.php" method="get">
										<input type="hidden" value = "<?= $idcom?>" name="idcom">
										<input type="hidden" value = "<?= $idpat?>" name="idpat">
										<input type="hidden" value = "<?= $ref?>" name="ref">
										<input type="hidden" value = "1" name="rej">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Rejetter la commande</button>
										</form>
                                        
                                    </div>
            
            </div>
         
             <div class="row">
                        
                                                  <div id="btn">
               		<button type="button" class="btn btn-primary btn-sm " id="imprimer" style="margin:5px;" onclick="textimprimer()"><a href="#" style="color:white;">Imprimer <i class='fa fa-paperclip'></i></a></button>
                   </div>
              <!-- mon modal -->
              <div id="commentaires" class="modal fade" style="overflow:auto;">           
                    <div class="modal-dialog modal-lg" style="overflow:auto;">
                    
            <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-danger" style="text-align:center;font-family:lucida;">Commentaires</h2>
                           
                        </div>
               			 <div class="modal-body">
                            <div id="">
                		         <div class="row" style="margin-top:30px;margin-left:200px;">
                		         			
                		         				
                               							<?php $commentaire = $z->commentaire_par_ref($pa);
                               							
                               							if(!is_null($commentaire)){
                               							    
                                                            foreach ($commentaire as $comm):?>
                                					 			<?php if(!is_null($comm->get_gest())){?>
                                					<div class="rowc pulls-left" style="margin-right:400px;">					
                                				<span class="text-danger"style=" margin-right:20px;"><small><i class="text text-primary"><?php echo $comm->get_date();?><br /></small></i><b><?php echo $comm->get_gest();?></b></span>
                               			 				<span><br /><?php echo $comm->get_contenu();?></span>
                               					    </div>   	    
                               							 <?php }?>
                               		 					<?php if(!is_null($comm->get_patient())){?>
                                 					<div class="row pulls-right" style="margin-left:300px;">
                               							 <span class="text-success"style=" margin-right:20px;"><small><i class="text text-primary"><?php echo $comm->get_date();?><br /></small></i><b><?php echo $comm->get_patient();?></b></span>
                               			 				<span><?php echo $comm->get_contenu();?></span>
                               						 </div>     
                                						<?php }?> 
                                						<?php endforeach;}else{?>
                                						<h6 class="text-success">Aucun commentaire enregistre pour cette commande</h6>
                                						<?php }?>
                              				  
                               </div>
                             </div>     
                       </div>
            			<div class="modal-footer">
            		   <button  class="btn btn-info" data-dismiss="modal" id="non">ok</button> 
            			</div>
           	</div>
        </div>
    </div>
         
 
                    <!-- pour les commentaires de la commande -->
         <div id="monModal" class="modal fade">           
                    <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-header">
                            <h2 id="modalcomment" class="modal-title text-danger" style="text-align:center;font-family:lucida;">Commentaires</h2>
                        </div>
               			 <div id="modalcontain" class="modal-body" style="max-height:50px;">
               			 <h6> Voulez vous ajouter un commentaire pour cette commande?</h6>
                            </div>
            			<div id="modalfooter" class="modal-footer">
                			<button  class="btn btn-danger" data-dismiss="modal" onclick="textcomment()" data-toggle="modal" id="oui"><a style="color:white;">OUI</a></button>
                			<button  class="btn btn-info" data-dismiss="modal" id="non">NON</button>    
            			</div>
           	</div>
        </div>
    </div>
                		        <?php endforeach;?>
                		        <!-- modal success -->
                		        <div id="success" class="modal fade">           
                    <div class="modal-dialog" style="background-color:#18d29e;">
              <div class="modal-content">
               			 <div class="modal-body" style="max-height:50px;background-color:#18d29e;">
               			 <h6 class="text-light"> Votre commentaire a ete envoye avec succes</h6>
                      </div>
            			<div class="modal-footer">
            			    <button  class="btn btn-success" data-toggle="modal"  id="ok" onclick="#"><a style="color:white;">fermer</a></button> 
            			     <button  class="btn btn-primary" data-toggle="modal"  id="ajouter" onclick="textcomment()"><a style="color:white;">ajouter</a></button>  
            			</div>
           	</div>
        </div>
    </div>
                		        
                        <div class="col-md-12" id="fa-sort"> <i class="fa fa-sort-up pull-right" id="fa"></i></div>
                        <form action="#" method="POST" id="form">
                        <textarea rows="10" cols="100" id="textecommenter" placeholder="saisir votre commentaire..." name="text"></textarea>
                        <button type="submit" class="btn btn-success btn-sm pull-right" id="envoyer" data-toggle="modal"   style="margin-right:25px;">Envoyer<i class='fa  fa-location-arrow'></i></button> 
                        
                        </form>
                        <span id="voircommentaires"><a class="text-primary" data-toggle="modal" href="#commentaires">voir tous les commentaires</a></span>
                        
                    </div>
                        <br />
                            <div class="row text-info" style="border-top:1px solid;font-family:lucida;margin:20px;"><i>Bon De Commande </i> </div>
                                                        
         </body>
         <script>
         
    		$(function(){
        		
        		$("#form").on("submit", function(e){
            		e.preventDefault();
            		var data = $("#textecommenter").val();
            		$.ajax({
                		url: "http://localhost/eclipse-workspace/pharma/",
                       	type: "GET",
                       	beforeSend: function(xhr){
                           	xhr.setRequestHeader("Authorization","Basic " +  btoa('cyrille:woupo'));
                       	},
                       	data: {do: "commentaire", gestionnaire: 1, commande:<?php echo $com?> , titre: data, contenu: data , type: 1},
                       	success: function(data){  
                           	$('#success').modal("show"); 	
                       	}
            		});
            		
            	});
    		});

    		$(function(){
                 $("#ok").click(function(){
                 /* windows.setTimeout(function(){
                      location.relaod();
                  }, 2000);*/
                  location.reload();
                	 //$('#commentaires').modal("show");
                     });
    		});
    		
	$(function(){
        		
        		$("#valider").click(function(){
            		$.ajax({
                		url: "http://localhost/eclipse-workspace/pharma/",
                       	type: "GET",
                       	beforeSend: function(xhr){
                           	xhr.setRequestHeader("Authorization","Basic " +  btoa('cyrille:woupo'));
                       	},
                       	data: {do: "commande", id:<?php echo $idcom?>, idpat:<?php echo $idpat?> ,ref:<?php echo $ref?>, statut:"validé",note:"artefan 500mg",livre:"0"},
                       	success: function(data){   
                           	alert("la commande a bien été validé");   	
                       	}
            		});
            	});
    		});
         </script>
   
                 
        </html>