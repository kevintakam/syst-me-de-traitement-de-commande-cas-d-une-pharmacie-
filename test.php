<?php
session_start([
]);
$curl =curl_init('http://localhost/eclipse-workspace/pharma/index.php?do=commande&nombre=1&nom=1');
curl_setopt_array($curl, [
    CURLOPT_USERPWD => "jospin:jeff",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 2
]);
$data= curl_exec($curl);
if ($data === false){
     var_dump(curl_error($curl));    
}else{
    $data=json_decode($data,true);
    echo  '<pre>';
    var_dump($data);
    echo '<pre>';
    $r = json_encode($data);
    echo $r;
    
}
curl_close($curl);
if($r!= 0){
  $_SESSION['nombrecommande'] = $r;
  var_dump($_SESSION['nombrecommande']);
}



?>
