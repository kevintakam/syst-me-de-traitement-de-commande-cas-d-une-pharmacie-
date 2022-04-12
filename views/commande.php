
<?php
require '../autoload.php';
$Api = new ApiClient();
if (!isset($_GET["rej"])){
if ($Api->test_connect()) {
    $Api->_get(7, ['id' => $_GET["idcom"], 'idpat' => $_GET["idpat"], 'ref' => $_GET["ref"], 'statut' => 'validee' , 'date_traite'=> getdate()]);
   header("location: commandevalide.php");
} else {
    echo '<pre>', var_dump($Api->test_connect()), '</pre>';
}
}else {
$Api = new ApiClient();
if ($Api->test_connect()) {
    $Api->_get(7, ['id' => $_GET["idcom"], 'idpat' => $_GET["idpat"], 'ref' => $_GET["ref"], 'statut' => 'rejette','date_traite'=> getdate()]);
    header("location: commanderejettee.php");
} else {
    echo '<pre>', var_dump($Api->test_connect()), '</pre>';
}
}




?>