<?php

class Commune
{
     private $_id;
     private $_nom;
     private $_villes;
    /**
     * @return mixed
     */
    public function getVilles()
    {
        return $this->_villes;
    }

    /**
     * @param mixed $_villes
     */
    public function setVilles($_villes)
    {
        $this->_villes = $_villes;
    }

    public function __construct()
    {}

    function __destruct()
    {}
    
    //GETTERS
    public  function get_id() {
        return $this->_id;
    }
    public  function get_commune() {
        return $this->_nom;
    }
    
   
    
    public function objectify(array $array){
        $commune = new Commune();
        
        if (array_key_exists('id', $array))
            $commune->_id = (int)$array['id'];
        
        if (array_key_exists('commune', $array) && strcmp($array['commune'], '') !== 0)
                $commune->_nom= trim($array['commune']);
        if(array_key_exists('ville', $array) || is_array($array['ville'])) {
                        $V = new Ville();
                        $commune->_villes = $V->objectify($array['ville']);
                                              
                   }
                            return $commune;
                            
    }
}
