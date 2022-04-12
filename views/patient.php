<?php
require '../autoload.php';
require 'header.php';
                echo '<div class="breadcrumbs" style="background-color:#18d26e;">';
                echo    '<div class="col-sm-4">';
                echo         ' <div class="page-header float-left" style="background-color:#18d26e;">';
                echo                  ' <div class="page-title" style="background-color:#18d26e;">';
                echo                           ' <h1 style="color:white;font-style:italic;"><b>Tous Les Patients</b></h1>';
                echo                    '</div>';
                echo           '</div>';
                echo    '</div>';
                echo      '<div class="col-sm-8" style="background-color:#18d26e;">';
                echo            '<div class="page-header float-right" style="background-color:#18d29e;">';
                echo                   '<div class="page-title" style="background-color:#18d29e;">';
                echo                            '<ol class="breadcrumb text-right" style="background-color:#18d26e;">';
                echo                                      '<li><a class="text-light" href="../index.php">Tableau de Bord</a></li>';
                echo                                       '<li><a class="text-light" href="#">Mes Patients</a></li>';
                echo                            '</ol>';
                echo                     '</div>';
                echo              '</div>';
                echo        '</div>';
                echo   '</div>';
         if(!isset($_SESSION['identifiant'])){
                header("location:page-login.php");}
    
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
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
       <body>
       <div class="card">
       <div class="card-header"></div>
       <div class="card-body">
       <div class="row"><div class="col-sm-12"><table id="bootstrap-data-table-export" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table-export_info">
       <thead>
       <tr role="row">
       <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 247px;">N</th>
       <th class="sorting_asc" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 247px;">NOMS</th>
       <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Telephone</th>
       <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Email</th>
       <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Lieu-Dit</th>
       <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Quartier</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Commune</th>
        <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Ville</th>
         <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">region</th>
         <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Pays</th>
         <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table-export" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 200px;">Action</th>
          
       </thead>
        <?php 
        $z = new RecupPatient();
        $data = $z->tous_les_patients();
        foreach ($data as $r): 
        
       ?>
          
       <tbody>
       <tr role="row">
       <td><?php echo $r->get_id() ;?></td>
       	<td><?php echo $r->get_nom().' '.$r->get_prenom() ;?></td>
       	<td><?php echo  $r->get_tel(); ?></td>
       	<td><?php echo  $r->getAdresse()[0]->get_email(); ?></td>
       	<td><?php echo  $r->getAdresse()[0]->get_lieu_dit();?></td>
        <td><?php echo $r->getAdresse()[0]->get_quartier(); ?></td>
        <td><?php echo $r->getAdresse()[0]->getCommunes()->get_commune(); ?></td>
        <td><?php echo $r->getAdresse()[0]->getCommunes()->getVilles()->get_ville();  ?></td>
        <td><?php echo $r->getAdresse()[0]->getCommunes()->getVilles()->getRegions()->get_region(); ?></td>
        <td><?php echo $r->getAdresse()[0]->getCommunes()->getVilles()->getRegions()->getPays()->get_pays(); ?></td>
        <td><div class="row"><div class="col-sm-3"><button class="btn btn-info" style="width:10px;"><i class="fa fa-edit"></i></button></div><div class="col-sm-3"><button class="btn btn-danger" data-toggle="modal" data-target="#monModal"><a href="patient.php?id=<?php echo $r->get_id(); ?>&adr=<?php echo $r->getAdresse()['0']->get_Id();?>#monModal" style="color:white;"><i class="fa fa-ban"></i></a></button></div></div></td>
       </tr>
       </tbody>
       
       
        
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
                           	<div style="text-align:center;font-family:lucida;"><h3><b>Etes vous sur de vouloir supprimer ce patient?</b></h3></div>
                             <div style="text-align:center;font-family:lucida;" class="text-warning"><h5>Si oui cette donnee sera perdue</h5></div>
                       </div>
        
            			<div class="modal-footer">
            			
                			<button  class="btn btn-danger" id="oui">OUI</button>
                			<button  class="btn btn-info" data-dismiss="modal" id="non">NON</button>    
            			</div>
           	</div>
        </div>
    </div>
                 <?php
     
       endforeach;?>
       </table>
       </div>
       </div>
       </div>
       </div>
       </body>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="..assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
   
        jQuery(function(){
            
             jQuery('#oui').click(function(){
                jQuery.ajax({
             			url: "http://localhost/eclipse-workspace/pharma/",
                    	type: "GET",
                    	beforeSend: function(xhr){
                        	xhr.setRequestHeader("Authorization","Basic " +  btoa('cyrille:woupo'));
                    	},
                    	data: {do:"adresse", identifiant:<?php echo $_GET['adr'];?>, supprimer:1},
                    	success: function(data){
                        	 alert("votre suppression a ete effectue avec success");
                        	 jQuery("#non").click();
                        	 windows.location.reload();
                        	 	
                        	   },
                    	error: function(data){                    		
                        	alert("impossible d executer votre requete");	
                    	}
                    	
         					});
                 });
       

            });
        jQuery(function(){
            
            jQuery('#oui').click(function(){
               jQuery.ajax({
            			url: "http://localhost/eclipse-workspace/pharma/",
                   	type: "GET",
                   	beforeSend: function(xhr){
                       	xhr.setRequestHeader("Authorization","Basic " +  btoa('cyrille:woupo'));
                   	},
                   	data: {do:"patient", identifiant:<?php echo $_GET['id'];?>, supprimer:1},
                   	success: function(data){
                       	return true; 	 	
                       	   },
                   	error: function(data){                    		
                       	alert("impossible d executer votre requete");	
                   	}
                   	
        					});
                });
      

           });
           
    </script>

</body>
    
    
    