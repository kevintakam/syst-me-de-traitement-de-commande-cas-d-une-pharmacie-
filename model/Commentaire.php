<?php
namespace model;

class Commentaire
{
    
    private  $_id;
    private  $_titre;
    private  $_contenu;
    private $_patient;
    private $_gestionnaire;
    private $_reference;
    private $_datecom;
    private $_type;
    public function __construct()
    {}

    function __destruct()
    {}
    public  function get_id(){return  (int) $this->_id;}
    public  function get_patient(){return  $this->_patient;}
    public  function get_gest(){return  $this->_gestionnaire;}
    public  function get_ref(){return  $this->_reference;}
    public  function get_date(){return  $this->_datecom;}
    public  function get_titre(){return  $this->_titre;}
    public  function get_contenu(){return  $this->_contenu;}
    /**
     * 
     * @param array $array
     * @return \model\Commentaire
     */
    public function objectify(array $array){
        $commentaire= new Commentaire();
        if (array_key_exists('id', $array))
                   $commentaire->_id = (int) $array['id'];
        if(array_key_exists('reference', $array) && strcmp($array['reference'] , '')!==0)
                  $commentaire->_reference = trim($array['reference']);
        if(array_key_exists('patient', $array) && strcmp($array['patient'] , '')!==0)
                   $commentaire->_patient = trim($array['patient']);
       if(array_key_exists('gestionnaire', $array) && strcmp($array['gestionnaire'] , '')!==0)
                   $commentaire->_gestionnaire = trim($array['gestionnaire']);
        if(array_key_exists('titre', $array) && strcmp($array['titre'] , '')!==0)
                   $commentaire->_titre = trim($array['titre']);
        if(array_key_exists('contenu', $array) && strcmp($array['contenu'] , '')!==0)
                   $commentaire->_contenu = trim($array['contenu']);
        if (array_key_exists('date commentaire', $array)&& strcmp($array['date commentaire'], ''))
            $commentaire->_datecom = $array['date commentaire'];
            if (array_key_exists('type', $array))
                $commentaire->_type = (int) $array['type'];
       
                                    return $commentaire;
    }
}

