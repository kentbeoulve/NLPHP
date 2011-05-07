<?php
/**
 * Cocke–Younger–Kasami Algorithm
 */
class CYKAlgorithm
{
    private $matrix;

    public function __construct( ChomskyNormalForm $grammar, $sentense = array() )
    {
        $length          = count( $sentense );
        $this->matrix[0] = $sentense;

        //! Remplissage du reste de la matrice
        for ( $i = 1; $i < $length; $i++)
        {
            for ( $j = 0; $j < ( $length - $i ); $j++)
            {
                for( $k = 0; $k < $i; $k++ )
                {
                    $b = $this->matrix[$k][$j];
                    $c = $this->matrix[$i - $k - 1][$j + $k + 1];

                    if ( !empty( $b ) && !empty( $c ) )
                    {
                        foreach( $b as $B )
                        {
                            foreach( $c as $C )
                            {
                                $ante = $g->antecedentsDe( "$B", "$C" );
                                $deja = $this->matrice[$i][$j];
                                $ok = true;

                                foreach( $ante as $a )
                                {
                                    if( !in_array( $a, $deja ) )
                                    {
                                        $ok = false;
                                        break;
                                    }
                                }

                                if( !$ok ) $this->matrix[$i][$j][] = $ante;
                            }
                        }
                    }
                }
            }
        }
    }
}



?>
