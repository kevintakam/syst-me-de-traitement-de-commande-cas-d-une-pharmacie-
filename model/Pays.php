<?php

class Pays
{

    private $_id;
    private $_nom;
    private $_indicatif;
    private $_pattern;
  
    

    public function __construct()
    {}
    
    function __destruct()
    {}
    
    //GETTERS
    public  function get_id() {
        return $this->_id;
    }
    public  function get_pays() {
        return $this->_nom;
    }
    /**
     * @return mixed
     */
    public function getIndicatif()
    {
        return $this->_indicatif;
    }
    
    /**
     * @return mixed
     */
    public function getPattern()
    {
        return $this->_pattern;
    }
    
    
    
    
    public function objectify(array $array){
        $pays = new Pays();
        
        if (array_key_exists('id', $array))
            $pays->_id = (int)$array['id'];
            
        if (array_key_exists('nom', $array) && strcmp($array['nom'], '') !== 0)
                $pays->_nom= trim($array['nom']);
        if (array_key_exists('indicatif', $array))
                    $pays->_indicatif = (int)$array['indicatif'];
        if (array_key_exists('pattern', $array) && strcmp($array['pattern'], '') !== 0)
                     $pays->_pattern = trim($array['pattern']);
   
        return $pays;
                
}

}
