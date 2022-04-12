<?php


class Commande
{
    private $_ref_com;
    private $_id;
    private $_statut;
    private $_ordonnance;
    private $_note;
    private $_livre;
    private $_date_com;
    private $_date_com_traite;
    private $_motif;
    
    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->_ref_com;
    }
    public function getMotif()
    {
        return $this->_motif;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getId_pat()
    {
        return $this->_id_pat;
    }

    /**
     * @return mixed
     */
    public function getId_gest()
    {
        return $this->_id_gest;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_statut;
    }

    /**
     * @return mixed
     */
    public function getOrdonnance()
    {
        return $this->_ordonnance;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->_note;
    }

    /**
     * @return mixed
     */
    public function getLivre()
    {
        return $this->_livre;
    }

    /**
     * @return mixed
     */
    public function getDate_com()
    {
        return $this->_date_com;
    }

    /**
     * @return mixed
     */
    public function getDate_com_traite()
    {
        return $this->_date_com_traite;
    }

  

    public function __construct()
    {}

    function __destruct()
    {}
    
    public function objectify(array $array){
        
        $commande = new Commande();
         if (array_key_exists('id', $array))
            $commande->_id = (int)$array['id'];
         if (array_key_exists('reference', $array) && strcmp($array['reference'], '') !== 0)
            $commande->_ref_com = trim($array['reference']);
         if (array_key_exists('statut', $array) && strcmp($array['statut'], '') !== 0)
            $commande->_statut = trim($array['statut']);
         if (array_key_exists('ordonnance', $array) && strcmp($array['ordonnance'], '') !== 0)
            $commande->_ordonnance = trim($array['ordonnance']);
         if (array_key_exists('note', $array) && strcmp($array['note'], '') !== 0)
            $commande->_note = trim($array['note']);
         if (array_key_exists('livre', $array))
            $commande->_livre = (int)$array['livre'];
         if (array_key_exists('datecommandetraite', $array) && strcmp($array['datecommandetraite'], ''))
            $commande->_date_com_traite = $array['datecommandetraite'];
          if (array_key_exists('motif', $array) && strcmp($array['motif'], ''))
            $commande->_motif = trim($array['motif']);
         if (array_key_exists('datecommande', $array)&& strcmp($array['datecommande'], ''))
            $commande->_date_com = $array['datecommande'];
         
             return $commande;
           }
    }