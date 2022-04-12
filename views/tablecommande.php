<?php 
spl_autoload_register(function(){
    require '../autoload.php';
});
    ?>
    
 
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr">
<!--<![endif]-->
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmacie-Plus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- les scripts -->
       <script src="../vendors/jquery/dist/jquery.min.js"></script>
   					    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    				    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                        <script src="../assets/js/main.js"></script>                      
                        
</head>
 
<body>        
      <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Toutes les Commandes</strong>
                            </div>
                            <div class="card-body">
                                 <div class="row"><div class="col-sm-12"><table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer " role="grid" aria-describedby="bootstrap-data-table-export_info"> 
                                    <thead>
                                        <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 247px;">Reference</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 183px;">Date creation</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 183px;">Patient</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Telephone</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 247px;">Date traitement de la commande</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:200px;">Statut</th>
                                        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Action</th></tr>
                                    </thead>
                                    <tbody>
                                              <?php 
                                              $z = new RecupPatient();
                                              $data = $z->tous_les_patients();
                                              foreach ($data as $r):
                                              if($r->getCommandes() !== null){
                                              for($i=0;$i<count($r->getCommandes());$i++){
                                              ?> 
                                              <?php if($r->getCommandes()[$i]->getStatus()=="en cours"){?> 
                                                  <tr>          
                                                  <td><?php echo $r->getCommandes()[$i]->getRef(); ?></td>
                                              	  <td> <?php  echo  $r->getCommandes()[0]->getDate_com();  ?></td>
                                               	  <td> <?php  echo $r->get_nom().''.$r->get_prenom();  ?></td>
                                               	  <td> <?php echo $r->get_tel();  ?></td>
                                                  <td> <?php echo $r->getAdresse()[0]->get_email();  ?></td>
                                                  <td> <?php  ?></td>
                                                  <td> <?php echo $r->getCommandes()[$i]->getStatus(); ?></td>  
                                                   
                                            
                                         
                                          <td> <button name ='id' class= "btn btn-success"><a href="consulter_commande.php/?id=<?php echo $r->get_id(); ?>&reference=<?php echo $r->getCommandes()[$i]->getRef(); ?>&commande=<?php echo $r->getCommandes()[$i]->getId(); ?>"style='color:white;' ">consulter commande</a></button></td>
                                       <?php }
                                              }?>
                                    </tr>
                                    
                                    <?php
                                  }
                                    endforeach;  ?>
                                   
                                    <!-- mon modal pour la suppression -->
                                     <div id="monModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h2 class="modal-title text-danger" style="text-align:center;font-family:lucida;">Suppression</h2>
                        </div>
                		<div style="text-align:center;" class="text-danger"><i class="fa  fa-ban fa-4x"></i></div>
               			 <div class="modal-body">
                           	<div style="text-align:center;font-family:lucida;"><h3><b>Etes vous sur de vouloir supprimer cette commande?</b></h3></div>
                             <div style="text-align:center;font-family:lucida;" class="text-warning"><h5>Si oui cette donnee sera perdue</h5></div>
                       </div>
                       
            			<div class="modal-footer">
            			
                			<button  class="btn btn-danger" id="oui" ><a style="color:white;">OUI</a></button>
                			<button  class="btn btn-info" data-dismiss="modal" id="non">NON</button>    
            			</div>
           	</div>
        </div>
    </div>
   
     
                                         
                                    <?php
                                    
                                    
                                  /*  
                                    
                                  
                                    foreach ($data as $r):
                                        for($j=0;$j<1;$j++){
                                        
                                    for($i=0;$i<1;$i++){
                                        $_SESSION['note']=$r[$j]['commande'][$i]['note'];
                                        $_SESSION['ordonnance']=$r[$j]['commande'][$i]['ordonnance'];
                                    ?>
                                    <tr> 
                                     <td> <?php  echo $_SESSION['ref_commande'] = $r[$j]['commande'][$i]['reference'];?></td>
                                       <td> <?php echo $_SESSION['date_com'] = $r[$j]['commande'][$i]['date_com'];?></td>
                                       <td> <?php echo $_SESSION['nom'] = $r[$j]['nom'].' '.$r[$j]['prenom'];?></td>
                                        <td> <?php  echo $_SESSION['telephone'] = $r[$j]['telephone'];?></td>
                                        <td> <?php  echo $_SESSION['email'] = $r[$j]['adresse']['0']['email'];?></td>
                                        <td> <?php  echo $_SESSION['date_com_traite'] = $r[$j]['commande'][$i]['date_com_traite'];?></td>
                                         <td> <?php  echo $r[$j]['commande'][$i]['statut'];?></td>
                                          <td> <button class= "btn btn-success"><a href="consulter_commande.php" style='color:white;' ">consulter commande</a></button></td>
                                    </tr>
                                    <?php 
                                          }
                                             }
                                           endforeach;
                                    ?>
                                    <?php
                                   
                                    foreach ($data as $r): 
                                    for($j=1;$j<2;$j++){
                                        $b = $d->nombre_com__par_jos($r[$j]['nom']);
                                    for($i=0;$i<$b;$i++){
                                    ?>
                                       <tr role="row">
                                       <td> <?php  echo  $r[$j]['commande'][$i]['reference'];?></td>
                                       <td> <?php  echo  $r[$j]['commande'][$i]['date_com'];?></td>
                                       <td> <?php  echo  $r[$j]['nom'].' '.$r[$j]['prenom'];?></td>
                                        <td> <?php  echo $r[$j]['telephone'];?></td>
                                        <td> <?php  echo $r[$j]['adresse']['0']['email'];?></td>
                                        <td> <?php  echo $r[$j]['commande'][$i]['date_com_traite'];?></td>
                                         <td> <?php  echo $r[$j]['commande'][$i]['statut'];?></td>
                                          <td> <button class= "btn btn-success">consulter commande</button></td>
                                       </tr>
                                    <?php
                                    }
                                    
                                    }
                                    endforeach
                                    ?>
                                    <?php 
                                    foreach ($data as $r): 
                                    for($j=3;$j<4;$j++){
                                        $b = $d->nombre_com__par_jos($r[$j]['nom']);
                                    for($i=0;$i<$b;$i++){
                                    ?>
                                       <tr role="row">
                                       <td> <?php  echo $r[$j]['commande'][$i]['reference'];?></td>
                                       <td> <?php  echo $r[$j]['commande'][$i]['date_com'];?></td>
                                       <td> <?php  echo $r[$j]['nom'];echo ' ';
                                       echo $r[$j]['prenom'];?></td>
                                        <td> <?php  echo $r[$j]['telephone'];?></td>
                                        <td> <?php  echo $r[$j]['adresse']['0']['email'];?></td>
                                        <td> <?php  echo $r[$j]['commande'][$i]['date_com_traite'];?></td>
                                         <td> <?php  echo $r[$j]['commande'][$i]['statut'];?></td>
                                          <td> <button class= "btn btn-success">consulter commande</button></td>
                                       </tr>
                                    <?php
                                    }
                                    
                                    }
                                    endforeach
                                    */
                                    ?>
                                             
                       </tbody>
                                </table>
                                </div>
                            </div>
                 </div>
          </div>
                   
     </body>
        <script>
       

        jQuery(function(){      
            jQuery('#oui').click(function(){
               jQuery.ajax({
            			url: "http://localhost/eclipse-workspace/pharma/",
                   	type: "GET",
                   	beforeSend: function(xhr){
                       	xhr.setRequestHeader("Authorization","Basic " +  btoa('cyrille:woupo'));
                   	},
                   	data: {do:"commande", identifiant:<?php echo $_GET['id'];?>, supprimer:1},
                   	success: function(data){
                   	 alert("votre suppression a ete effectue avec success");
                	 jQuery("#non").click();
                	 location.reload();
                       	   },
                   	error: function(data){                    		
                       	alert("impossible d executer votre requete");	
                   	}
                   	
        					});
                });
      

           });
        </script>                
                     	
                    

</body>
                    

