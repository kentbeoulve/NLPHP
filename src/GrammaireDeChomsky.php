<?php

include_once('Role.php');

class GrammaireDeChomsky {

    protected $regles;

    public function __construct( $regles = array() )
    {
        $this->regles = $regles;
    }

    /**
     * Permet de rajouter une règle sous la forme d'une chaine de caractères
     * Exemple : "R -> AB XY"
     *
     * @param r
     * @throws Exception
     */
    public function ajoute( Regle $r )
    {
        $this->regles[] = $r;
    }

    /**
     * Soit "R-> AB XY" retourne tous les R tel que $d = "AB" ou $d ="XY"
     */
    public function antecedentsDe( $d1, $d2 = null )
    {
        $resultat = array();

        foreach( $this->regles as $regle )
        {
            if ( $regle->donne( $d1, $d2 ) )
            {
                $resultat[] = $regle->gauche;
            }
        }
        return $resultat;
    }

    public function __toString()
    {
        $s="";

        foreach( $this->regles as $regle )
        {
            $s .= "$regle\n";
        }

        return $s;
    }
}
?>
