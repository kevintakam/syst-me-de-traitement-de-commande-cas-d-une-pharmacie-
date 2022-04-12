<?php

class Envoyerdonnee
{

    public function __construct()
    {}

    function __destruct()
    {}
    
    public function commenter(int $idgest, int $com, string $titre , string $contenu){
        $Api = new ApiClient();
        if ($Api->test_connect()) {
            $commentaire = $Api->_get(6, ['gestionnaire' => $idgest, 'commande' => $com, 'titre' => $titre, 'contenu' => $contenu ]);
            if($commentaire)
            {return TRUE;}
            else{
                return False;
            }
        } else {
            echo '<pre>', var_dump($Api->test_connect()), '</pre>';
        }
    }
}



