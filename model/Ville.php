<?php

class Ville
{

    private $_id;
    private $_nom;
    private $_regions;
    /**
     * @return mixed
     */
    public function getRegions()
    {
        return $this->_regions;
    }

    /**
     * @param mixed $_regions
     */
    public function setRegions($_regions)
    {
        $this->_regions = $_regions;
    }

    public function __construct()
    {}
    
    function __destruct()
    {}
    
    //GETTERS
    public  function get_id() {
        return $this->_id;
    }
    public  function get_ville() {
        return $this->_nom;
    }
    
    
    public function objectify(array $array){
        $ville = new Ville();
        
        if (array_key_exists('id', $array))
            $ville->_id = (int)$array['id'];    
        if (array_key_exists('nom', $array) && strcmp($array['nom'], '') !== 0)
            $ville->_nom= trim($array['nom']);
        if(array_key_exists('region', $array) || is_array($array['region'])) {   
                   $R = new Region();
                    $ville->_regions = $R->objectify($array['region']);
                }
                return $ville;
                
}

}
