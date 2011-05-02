<?php

include_once('Role.php');

class GrammaireDeChomsky {

    protected $regles;

    public function __construct( $regles = array() )
    {
        $this->regles = $regles;
    }

    public function ajoute( Regle $r )
    {
        $this->regles[] = $r;
    }

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
