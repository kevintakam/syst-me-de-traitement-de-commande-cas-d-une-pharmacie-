<?php 
session_start();
spl_autoload_register(function(){ 
    
    require '../Recuperer.php';
});
$d= new Recuperer();
 ?>

 

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
  <?php 
  
  $de = $d->gestionnaire();  
 /* if(isset($_SESSION['id'])){
      
     header("location:../index.php");
       exit;
 }*/
 if(isset($_POST['submit'])){
     
     if(!empty($_POST['login']) && !empty($_POST['pwd'])){
         
         $_POST['login'] = htmlentities($_POST['login'], ENT_QUOTES);
         $_POST['pwd'] = htmlentities($_POST['pwd'], ENT_QUOTES);
        
         foreach ($de as $c):

         for($i=0;$i<$d->nombregestionnaire();$i++){
             if($_POST['login'] == $c[$i]['login'] && $_POST['pwd'] == $c[$i]['password']){
                 $id = $c[$i]['identifiant'];
                 $_SESSION['identifiant'] = $id;
                 $_SESSION['login']=$_POST['login'];
                 header("location: ../index.php");
             }
             else{
                echo '<span style="color:red">'; echo " le nom d utilisateur ou le mot de passe est incorrect  ";echo '</span>';
                
             }
         }
         endforeach;
     }
 }
  
  ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmacie Plus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../apple-icon.png">
    <link rel="shortcut icon" href="../images/log1.png">
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <h1 style="color:white;font-family:lucida;">Veuillez vous connecter</h1>
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <label> Nom Utilisateur </label>
                            <input type="text" class="form-control" placeholder="Email ou tel" id="login" name="login" required="required">
                        </div>
                            <div class="form-group">
                                <label>Mot de Passe</label>
                                <input type="password" class="form-control" placeholder=" saisir votre mot de passe" id="pwd" name="pwd" required="required">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> mot de passe oublie
                            </label>
                                </div>
                                <button type="submit"  id="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Connexion</button>
                                                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
