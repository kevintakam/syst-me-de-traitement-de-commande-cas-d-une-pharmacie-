<?php 
   session_start();
   spl_autoload_register(function(){
   require 'autoload.php';
   });
        $d= new Recuperer();
         $r = new Patient();
         $e = new RecupPatient();
         if(!isset($_SESSION['identifiant'])){
             header("location:views/page-login.php");
         }
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
        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="images/log1.png">
        <link rel="stylesheet" href="assets/css/style2.css">
        <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   
</head>

<body>
    <!-- Left Panel -->
      <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div class="navbar-header">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="row">
               <div class="logo" > 
               <img id="log" src="images/log1.png">
               </div>
                </div>
                <!-- pour le logo -->
                <br />
                <br />
            </div>             
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Tableau de Bord </a>
                    </li>
                    <h3 class="menu-title">GERER COMMANDE</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Mes Commandes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-archive"></i><a href="views/entete.php">Listes commandes</a></li>
                            <li><i class="menu-icon fa fa-archive"></i><a href="views/commandevalide.php"> <small>Commandes Validees</small></a></li>
                            <li><i class="menu-icon fa fa-ban"></i><a href="views/commanderejettee.php"><small>Commandes Rejetees</small></a></li>
                        </ul>
                    </li>
                    
                             <h3 class="menu-title"> PATIENT</h3><!-- /.menu-title -->
                            <li class="menu-item-has-children dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Mes Patients</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="menu-icon fa fa-users"></i><a href="views/patient.php"><small>Listes des patients</small></a></li>
                                </ul>
                            </li>
                            
                    <h3 class="menu-title">Gerer Compte</h3><!-- /.menu-title -->
                  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear"></i>Mes Comptes</a>
                     <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-archive"></i><a href="views/compte.php">Mon compte</a></li>
                        </ul>   
                    </li>
                    <h3 class="menu-title">A propos</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Infos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="views/page-login.php">se connecter</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
  
    <!-- Right Panel -->
 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left" style="background-color:#18d26e	;"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form" method="POST" action="views/recherche.php">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search"  name="search" id="search" >
                                <button class="btn btn-success" type="submit" name="valider">rechercher</i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-success"><?php echo $e->nombre_commande();?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                <p class="text-success">vous avez   <?php echo $e->nombre_commande();?>  commande non traitee</p>
                                <a class="dropdown-item media bg-flat-color-1 text-success" href="views/entete.php">
                                <i class="fa fa-check"></i>
                                <p>cliquez ici pour poursuivre</p></a>
                                
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary"><?php echo $e->nombre_commentaire();?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <p class="red">vous avez <?php echo $e->nombre_commentaire();?> messages </p>
                                
                               							<?php $commentaire = $e->commentaire_par_type(0);  							
                                                            foreach ($commentaire as $comm):?>
                                					 
                               		 				     
                                					
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><i class="fa fa-user fa-2x"></i></span>
                                <span class="message media-body">
                                    <span class="name float-left"><?php echo $comm->get_patient();?></span>
                                    <span class="time float-right"><?php echo $comm->get_date();?></span>
                                        <p class="text-success"><?php echo $comm->get_contenu();?></p>
                                </span>
                          </a>
                          	 
                                						<?php endforeach;?>
                            </div>
                           
                        </div>
                         
                    </div>
                </div>

                <div class="col-sm-5">
                      
                    <div class="user-area dropdown float-right text-success" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="user-avatar rounded-circle" src="images/fr.png" alt="User Avatar">  
                        </a>
                       
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i><?php echo ' '. $_SESSION['login'];?></a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count"><?php echo $e->nombre_commande();?></span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> parametres</a>

                            <a class="nav-link"  data-toggle=modal data-dismiss="#staticModalLabel" href="#staticModalLabel"><i class="fa fa-power-off"></i> deconnexion</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <select>
                        <option value="0">FR</option>
                        <option value="0">ENG</option>
                        </select>

                	</div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Table de Bord</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Table de Bord</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
            <?php  
            //var_dump($r->objectify($d->touteslescommandes()));?>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                           <h1> <span id="nbrcom" class="count"><?php echo $e->nombre_commande();?></span></h1>
                        </h4>
                        <p class="text-light">nombre commande non traitees</p>
                       
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                       </div>
                    </div>
               </div>
          </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        
                        <h4 class="mb-0">
                            <h1><span class="count"><?php echo $e->nombre_commande_traite();?></span></h1>
                        </h4>
                        <p class="text-light">Nombre de commandes traitees</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        
                        <h4 class="mb-0">
                            <h1><span class="count"><?php echo $e->nombre_patient() ;?></span></h1>
                        </h4>
                        <p class="text-light">Nombre de patient&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-users fa-2x"></i></p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        
                        <h4 class="mb-0">
                           <h1><span class="count"><?php echo $e->nombre_gestionnaire();?></span></h1>
                        </h4>
                        <p class="text-light">Nombre de comptes &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-cogs fa-2x"></i></p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
<div id="staticModalLabel" class="modal fade">
        <div class="modal-dialog">
    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Deconnexion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-power-off"></i></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Etes vous sur de vouloir vous deconnecter?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger"><a href="views/page-login.php" style="color:white;">confirmer</a></button>
                            </div>
                        </div>
                </div>
           </div>
            <div class="col-lg-3 col-md-6"></div>
            <!--/.col-->
 		    <div class="col-lg-3 col-md-6"></div>
            <!--/.col-->
            <div class="col-lg-3 col-md-6"></div>
            <div class="col-lg-3 col-md-6"></div>
            <div class="col-xl-6"></div>
                        </div>
                      
                        <!--/.row-->
                       
    <!-- Right Panel -->
    
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
    
        (function($) {
            "use strict";
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

        
    </script>
</body>

</html>

