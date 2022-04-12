<?php

class Region
{
    
    private $_id;
    private $_nom;
    private $_pays;
  
    /**
     * @param mixed $_pays
     */
    public function setPays($pays)
    {
        $this->_pays = $pays;
    }

    public function __construct()
    {}
    
    function __destruct()
    {}
    
    //GETTERS
    public  function get_id() {
        return $this->_id;
    }
    public  function get_region() {
        return $this->_nom;
    }
    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->_pays;
    }
    
    
    public function objectify(array $array){
        $region = new Region();
        
        if (array_key_exists('id', $array))
            $region->_id = (int)$array['id'];
            
        if (array_key_exists('nom', $array) && strcmp($array['nom'], '') !== 0)
            $region->_nom= trim($array['nom']);
        if(array_key_exists('pays', $array) || is_array($array['pays'])) {
                    $P = new Pays();
                    $region->_pays = $P->objectify($array['pays']);
            }
                
                return $region;
                
    }
    
}

