<?php
class Regle
{
    public $gauche;
    public $droite = array();

   /**
    * public Regle(String g, String d) { gauche=g;
    *
    * droite= new Vector<String>(); if(d.length()>0)
    * droite.add(String.valueOf(d.charAt(0))); if
    */
    public function __construct( $gauche, $droite1, $droite2 = null )
    {
        $this->gauche = $gauche;
        $this->droite = array();
        $this->droite[] = $droite1;
        if( !empty( $droite2 ) ) $this->droite[] = $droite2;
    }

    /**
     * Retourne vrai si la règle donne $d1 et $d2
     */
    public function donne( $d1, $d2 = false )
    {
        if( empty( $d2 ) )
            return in_array( $d1, $this->droite );
        else
            return in_array( $d1, $this->droite ) && in_array( $d2, $this->droite );
    }

    public function __toString()
    {
        return $this->gauche." -> ".implode(' ', $this->droite );
    }
}

?>

