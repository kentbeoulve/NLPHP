<?php
class MatriceDeCoke
{
    protected $matrice;

    public function __construct( $etiquettes, GrammaireDeChomsky $g)
    {
        $this->matrice = array();

        if( empty( $etiquettes ) ) return;

        $length = count( $etiquettes );

        //! Initialisation de la matrice
        for( $i = 0; $i < $length; $i++ )
        {
            for( $j = 0; $j < ($length - $i); $j++)
            {
                $this->matrice[$i][$j]= array();
            }
        }

        //! Initialisation de la première ligne
        for ( $i = 0; $i < $length; $i++)
        {
            $this->matrice[0][$i] = $g->antecedentsDe( $etiquettes[$i] );
        }

        //! Remplissage du reste de la matrice
        for ( $i = 1; $i < $length; $i++)
        {
            for ( $j = 0; $j < ( $length - $i ); $j++)
            {
                for( $k = 0; $k < $i; $k++ )
                {
                    $b = $this->matrice[$k][$j];
                    $c = $this->matrice[$i - $k - 1][$j + $k + 1];

                    if ( !empty( $b ) && !empty( $c ) )
                    {
                        foreach( $b as $B )
                        {
                            foreach( $c as $C )
                            {
                                $ante = $g->antecedentsDe( "$B", "$C" );
                                $deja = $this->matrice[$i][$j];
                                $ok   = true;

                                foreach( $ante as $a )
                                {
                                    if( !in_array( $a, $deja ) )
                                    {
                                        $ok = false;
                                        break;
                                    }
                                }

                                if( !$ok ) $this->addValues( $ante, $i, $j);
                            }
                        }
                    }
                }
            }
        }
    }

    public function addValues( $v, $i, $j)
    {
        if( empty( $v ) ) return;

        foreach( $v as $V )
        {
            $this->matrice[$i][$j][] = $V;
        }
    }

    public function __toString()
    {
        $s = "";
        for( $i = ( count( $this->matrice ) - 1); $i >= 0; $i-- )
        {
            $s.= "\n";
            $s.= $i;
            $s.= "\t";

            for ( $j = 0; $j < count( $this->matrice[$i] ); $j++)
            {
                $b = $this->matrice[$i][$j];

                $s.= implode(",",$b)."\t";
            }
        }

        return $s;
    }

    public function isValid( $tag)
    {
        return in_array( $tag, $this->matrice[count($this->matrice)-1][0] );
    }
}
?>
