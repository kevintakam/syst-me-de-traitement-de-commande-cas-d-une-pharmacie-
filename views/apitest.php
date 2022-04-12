<?php
require '../autoload';
$Api = new ApiClient();
if ($Api->test_connect()) {
    $patients = $Api->_post(5, ['/create.php']);
    if($patients===true){
        echo json_encode(['statut' =>1,'reponse'=>'enregistrement reussi']);
                     }
    else {
        return false;
    }
    
}else {
    echo '<pre>', var_dump($Api->test_connect()), '</pre>';
}
