
 <?php 

 require_once 'header.php';
 echo '<div class="breadcrumbs" style="background-color:#18d26e;">';
 echo    '<div class="col-sm-4">';
 echo         ' <div class="page-header float-left" style="background-color:#18d26e;">';
 echo                  ' <div class="page-title" style="background-color:#18d26e;">';
 echo                           ' <h1 style="color:white;font-style:italic;"><b>Listes des Commandes</b></h1>';
 echo                    '</div>';
 echo           '</div>';
 echo    '</div>';
 echo      '<div class="col-sm-8" style="background-color:#18d26e;">';
 echo            '<div class="page-header float-right" style="background-color:#18d29e;">';
 echo                   '<div class="page-title" style="background-color:#18d29e;">';
 echo                            '<ol class="breadcrumb text-right" style="background-color:#18d26e;">';
 echo                                      '<li><a class="text-light" href="../index.php">Tableau de Bord</a></li>';
 echo                                       '<li><a class="text-light" href="#">Mes Commandes</a></li>';
 echo                            '</ol>';
 echo                     '</div>';
 echo              '</div>';
 echo        '</div>';
 echo   '</div>';
 require 'tablecommande.php';