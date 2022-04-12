<?php

 class  Recuperer
{
    const HOST ='http://localhost/eclipse-workspace/pharma/';
   
    public function __construct()
    {
        $this->host='http://localhost/eclipse-workspace/pharma/';
    }
    function __destruct(){}
    function gestionnaire(){
        $curl =curl_init(self::HOST.'?do=gestionnaire&tousgest=1&byjson=1');
        $data = self::recup($curl);
        return  $data;
    }
    function nombre_com__par_jos(string $nom){
        $curl =curl_init(self::HOST.'?do=commande&nom='.$nom.'&byjson=1');
        $data = self::recup($curl);
        return  $data;
                      }
        function nombre_com_traite(){
            $curl =curl_init(self::HOST.'?do=commande&traite=1&nom=1');
            $data = self::recup($curl);
            return  $data;
        }
        
        public  function nombrecommande(){
            $curl =curl_init(self::HOST.'?do=commande&nombre=1&nom=1');
            $data = self::recup($curl);
            return  $data;
        }
        public  function nombregestionnaire(){
            $curl =curl_init(self::HOST.'?do=gestionnaire&nombre=1&nom=1');
            $data = self::recup($curl);
            return  $data;
        }
        public  function patient(int $id){
            $curl =curl_init(self::HOST.'?do=patient&pat='.$id.'&byjson=1');
            $data = $this->recup($curl);
            return $data;
        }
        public function touteslescommandes(){
            $curl =curl_init(self::HOST.'?do=patient&touspatient=1&byjson=1');
            $data = $this->recup($curl);
            return $data;
           
        }
        
       
        
        public function touslespays(){
            $curl =curl_init(self::HOST.'?do=pays&touspays=1&byjson=1');
              $data =  self::recup($curl);
              return $data;
          
        }
        public function touslesregions(){
            $curl =curl_init(self::HOST.'?do=region&toutesreg=1&byjson=1');
            $this->recup($curl);
        }
        
        public function recup($curl){
            curl_setopt_array($curl, [
                CURLOPT_USERPWD => "cyrille:woupo",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 2
            ]);
            $data= curl_exec($curl);
            if ($data === false){
                var_dump(curl_error($curl));
            }else{
                $data=json_decode($data,true);
               
                return $data;
            }
            curl_close($curl);
        }
  
    }
    
    
   
   
     
     
   
  
    
    
    

