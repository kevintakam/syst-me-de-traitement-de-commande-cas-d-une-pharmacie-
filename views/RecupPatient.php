<?php


use model\Commentaire;

class RecupPatient
{

    public function __construct()
    {}

    function __destruct()
    {}
  
    public function tous_les_patients(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $patients = $Api->_get(0, ['touspatient' => 1, 'byjson' => 1]);
            if(!is_null($patients)) {
                $P = new Patient();
                foreach ($patients as $patient_attrs):
                    $Patients[] = $P->objectify($patient_attrs); 
               
                      endforeach;
                      
               
                   
                  /*  $Patients[] = $C->objectify($patient_attrs['adresse']['0']['commune']);
                   $Patients[] = $V->objectify($patient_attrs['adresse']['0']['commune']['ville']);
                    $Patients[] = $R->objectify($patient_attrs['adresse']['0']['commune']['ville']['region']);
                    $Patients[] = $Pa->objectify($patient_attrs['adresse']['0']['commune']['ville']['region']['pays']);*/
                    
                    
                      
                //echo $Patients['0']->get_nom().'  '.$Patients['0']->get_prenom().'  '.$Patients['0']->get_tel().' '.$Patients['1']->get_email().' '.$Patients['1']->get_quartier();
            }
         
            return $Patients;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    
    public function tous_les_patients_par_id(int $id){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $patients = $Api->_get(0, ['pat' => $id, 'byjson' => 1]);
            if(!is_null($patients)){
                $P = new Patient();
                foreach ($patients as $patient_atts):
                $Patients[] = $P->objectify($patient_atts);
               endforeach;
            
                
                /*  $Patients[] = $C->objectify($patient_attrs['adresse']['0']['commune']);
                 $Patients[] = $V->objectify($patient_attrs['adresse']['0']['commune']['ville']);
                 $Patients[] = $R->objectify($patient_attrs['adresse']['0']['commune']['ville']['region']);
                 $Patients[] = $Pa->objectify($patient_attrs['adresse']['0']['commune']['ville']['region']['pays']);*/
                
                
                //echo $Patients['0']->get_nom().'  '.$Patients['0']->get_prenom().'  '.$Patients['0']->get_tel().' '.$Patients['1']->get_email().' '.$Patients['1']->get_quartier();
            }
            return $Patients;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    /**
     * 
     * @param int $id
     * @return Commande
     */
    public function commande_par_id(int $id){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(7, ['id' => $id, 'byjson' => 1]); 
            if(!is_null($commande)) {
                $C = new Commande();
                $commandes[] = $C->objectify($commande['commande']['0']);
           
            }
            return $commandes;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    /**
     *
     * @param int $id
     * @return Commande
     */
    public function suppression_pat(int $id){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $patient = $Api->_get(0, ['identifiant' => $id, 'supprimer' => 1]);
            if($patient)
            {return TRUE;}
            else{
                return False;
            }
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    /**
     * 
     * @param int $id
     * @return Commande
     */
    public function suppression(int $id){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(7, ['identifiant' => $id, 'supprimer' => 1]);
           if($commande)     
           {return TRUE;}
           else{
               return False;
           }
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    public function nombre_patient(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $patient = $Api->_get(0, ['nombre' => 1, 'chiffre' => 1]);
            return $patient;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    /**
     * 
     * @return NULL|mixed
     */
    public function nombre_commande(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(7, ['nombre' => 1, 'nom' => 1]);
            return $commande;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    public function commandeUpate(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(7, ['id' => $_GET["idcom"], 'idpat' => $_GET["idpat"], 'ref' => $_GET["ref"], 'statut' => 'validee', 'no']);
            return $commande;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    public function nombre_commande_traite(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(7, ['traite' => 1, 'nom' => 1]);
            return $commande;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    public function nombre_gestionnaire(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commande = $Api->_get(8, ['nombre' => 1, 'nom' => 1]);
            return $commande;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    
    public function nombre_commentaire(){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commentaire = $Api->_get(6, ['nombre' => 1, 'nom' => 1]);
            return $commentaire;
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    //rechercher par un nom 
    
    // rechercher un patient par numéro de telephone
    public function rech_pat_nom(string $nom){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $patient = $Api->_get(0, ['nom' => $nom, 'existe' => 1]);
            if($patient)
            {
                $P = new Patient();
                foreach ($patient as $patient_attrs):
                $Patient[] = $P->objectify($patient_attrs);
                return $Patient;
                endforeach;
            }
            else{
                return False;
            }
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    
    
    // rechercher un patient par numéro de telephone
    public function rech_pat(int $tel = NULL, string $nom = NULL ){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            if(!is_null($tel)){
                $patient = $Api->_get(0, ['tel' => $tel, 'byjson' => 1]);}
            if(!is_null($nom)){
                $patient = $Api->_get(0, ['nom' => $nom, 'existe' => 1]);}        
            if($patient)
            {
                $P = new Patient();
                foreach ($patient as $patient_attrs):
                $Patient[] = $P->objectify($patient_attrs);
                return $Patient;
                endforeach;
            }
            else{
                return False;
            }
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
    
    
    public function commentaire_par_ref(string $refcom){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commentaire = $Api->_get(6, ['refcom' => $refcom, 'byjson' => 1]);
            if($commentaire==NULL){
                return NULL;
            }
  
                $A = new Commentaire(); 
                foreach ($commentaire as $comm):
                for($i=0;$i<count($comm);$i++){
                $commentaires[] = $A->objectify($comm[$i]); 
                }
                return $commentaires;
                endforeach;  
                
        
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
          
     }
     
     public function commentaire_par_type(int $type){
         $Api = new ApiClient();
         if ($Api->test_connect()) {
             $commentaire = $Api->_get(6, ['type' => $type, 'existe' => 1]);
             if($commentaire==NULL){
                 return NULL;
             }
             
             $A = new Commentaire();
             foreach ($commentaire as $comm):
             for($i=0;$i<count($comm);$i++){
                 $commentaires[] = $A->objectify($comm[$i]);
             }
             return $commentaires;
             endforeach;
             
             
         } else {
             echo '<pre>', var_dump($Api->test_connect()), '</pre>';
         }
         
     }


}
