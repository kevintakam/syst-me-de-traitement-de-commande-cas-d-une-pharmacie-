<?php

class ApiClient
{
    const _HOST     =   'http://localhost/eclipse-workspace/pharma/';
    const _LOGIN    =   'cyrille';
    const _PWD      =   'woupo';
    const _MODULES  =   ['patient', 'adresse','commune','ville','region','pays','commentaire','commande','gestionnaire'];
    
    private $_auth;
    public function getAuth() { return $this->_auth; }


    public function __construct() {
        $this->_auth = base64_encode(join(':', [ApiClient::_LOGIN, ApiClient::_PWD]));
    }
    function __destruct() {}
    
    
    /**
     * Test connexion
     * @return boolean
     */
    public function test_connect() {
        $init = curl_init();
        curl_setopt_array($init, [
            CURLOPT_URL => ApiClient::_HOST,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => ["Authorization: Basic " . $this->_auth]]);
            
        $result = curl_exec($init);
        curl_close($init);
        
        if($this->isJSON($result)) {
            $R = json_decode($result, TRUE);
            if(array_key_exists('status', $R) && intval($R['status']) == 1)
                return TRUE;
        }
        
        return FALSE;
    }
    
    /**
     * Executeur de requetes GET
     * @param int $module
     * @param array $args
     * @return NULL|mixed
     */
    public function _get(int $module, array $args) {
        if(is_null($module) || !is_int($module) || !array_key_exists($module, ApiClient::_MODULES))
            return NULL;
        
         $arg['do'] = ApiClient::_MODULES[(int) $module];
         foreach ($args as $key => $value)
             $arg[$key] = $value;
         
         $query = join('?', [ApiClient::_HOST, http_build_query($arg)]);
       
         $init = curl_init();
         curl_setopt_array($init, [
             CURLOPT_URL => $query,
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_TIMEOUT => 30,
             CURLOPT_CUSTOMREQUEST => "GET",
             CURLOPT_HTTPHEADER => ["Authorization: Basic " . $this->_auth]]);
         
         $result = curl_exec($init);
         curl_close($init);
         
         if($this->isJSON($result)) 
             return json_decode($result, TRUE);
         
 
         echo NULL;
    }
    public function _post(int $module, array $args, array $params) {
        if(is_null($module) || !is_int($module) || !array_key_exists($module, ApiClient::_MODULES))
            return NULL;
            
            foreach ($args as $key => $value)
                $arg[$key] = $value;  
                $query = join('', [ApiClient::_HOST, $arg[$key]]);     
                $init = curl_init();
                curl_setopt_array($init, [
                    CURLOPT_URL => $query,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_POST => $params,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_HTTPHEADER => ["Authorization: Basic " . $this->_auth]]);
                 curl_exec($init);
                curl_close($init);
                
               return true;
                    
                    
                    
    }
    
    /**
     * Verifier si JSON retouné
     * @param string $string
     * @return boolean
     */
    public function isJSON(string $string) {
        json_decode($string);
        return json_last_error() == JSON_ERROR_NONE;
    }
}

   