<?php

class Adresse
{
    private $_id;
    private $_email;
    private $_quartier;
    private $_lieu_dit;
    private $_type_a;
    
    private $_communes;
    
    
    /**
     * @return mixed
     */
    public function getCommunes()
    {
        return $this->_communes;
    }

    /**
     * @param mixed $_communes
     */
    public function setCommunes($_communes)
    {
        $this->_communes = $_communes;
    }

    public function __construct()
    {}

    function __destruct()
    {}
    //GETTERS
    public  function get_Id() {
        return $this->_id;
    }
    public  function get_email() {
        return $this->_email;
    }
    public  function get_quartier() {
        return $this->_quartier;
    }
    public  function get_lieu_dit() {
        return $this->_lieu_dit;
    }
    
    
    public function objectify(array $array){
        $adresse = new Adresse();
        
        if (array_key_exists('id', $array))
            $adresse->_id = (int)$array['id'];
        if (array_key_exists('email', $array) && strcmp($array['email'], '') !== 0)
            $adresse->_email= trim($array['email']);
        if (array_key_exists('quartier', $array) && strcmp($array['quartier'], '') !== 0)
            $adresse->_quartier = trim($array['quartier']);
        if (array_key_exists('lieu', $array) && strcmp($array['lieu'], '') !== 0)
            $adresse->_lieu_dit = trim($array['lieu']);
        if (array_key_exists('type', $array))
            $adresse->_type_a = (int)$array['type'];
        if(array_key_exists('commune', $array) || is_array($array['commune'])) {    
                    $C = new Commune();
                   $adresse->_communes = $C->objectify($array['commune']);
                
            }
                        return $adresse;
                        
    }
}
