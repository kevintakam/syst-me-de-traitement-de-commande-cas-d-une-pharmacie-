<?php
 require 'Commande.php';
    class Patient
    {

                private $_id;
                private $_nom;
                private $_prenom;
                private $_telephone;        
                private $_adresses;
                private $_commandes;
          
                /**
                 * @return mixed
                 */
                public function getCommandes()
                {
                    return $this->_commandes;
                }
            
                /**
                 * @return Adresse
                 */
                public function getAdresse()
                {
                    return $this->_adresses;
                }
            
                /**
                 * @param Adresse $_adresse
                 */
                public function setAdresse($adresse)
                {
                    $this->_adresses = $adresse;
                }
               
              
                
            
                public function __construct(){}
                public function __destruct(){}
                //GETTERS
                public  function get_id() {
                    return $this->_id;
                }
                public  function get_nom() {
                    return $this->_nom;
                }
                public  function get_prenom() {
                    return $this->_prenom;
                }
                public  function get_tel() {
                    return $this->_telephone;
                }
                
                
               
                 //SETTERS
                public  function set_nom(string $nom){
                    $this->nom = htmlspecialchars(trim($nom));
                }
                public  function set_prenom(string $prenom){
                    $this->prenom= htmlspecialchars(trim($prenom));
                }
                public  function set_tel(string $tel){
                    $this->telephone = htmlspecialchars(trim($tel));
                }
                
                
                public function objectify(array $array) {
                    $patient = new Patient();
                   
                       if (array_key_exists('id', $array))
                          $patient->_id = (int) $array['id']; 
                           
                       if (array_key_exists('nom', $array) && strcmp($array['nom'], '') !== 0)
                          $patient->_nom= trim($array['nom']);
                       
                       if (array_key_exists('prenom', $array) && strcmp($array['prenom'], '') !== 0)
                           $patient->_prenom = trim($array['prenom']);
                       
                       if (array_key_exists('telephone', $array) && strcmp($array['telephone'], '') !== 0)
                           $patient->_telephone = trim($array['telephone']);
                      
                       if(array_key_exists('adresse', $array) && is_array($array['adresse'])) {
                          
                               foreach ($array['adresse'] as $addr) {
                                   $A = new Adresse();
                                   $patient->_adresses[] = $A->objectify($addr);
                               }
                       }
                     
                     if(array_key_exists('commande', $array) && is_array($array['commande'])) {
                         
                                   foreach ($array['commande'] as $commande) {
                                       $C = new Commande();
                                       $patient->_commandes[] = $C->objectify($commande);
                                   }
                          }
                          
                               
                           return $patient;
                }
                
               
       
        
    }
    
