<?php
/**
 * Cocke–Younger–Kasami Algorithm
 */
class CYKAlgorithm
{
    private $grammar;
    public $matrix;

    public function __construct( ChomskyNormalForm $grammar, $sentence = array() )
    {
        $this->grammar = $grammar;

        if( !empty( $sentence ) )
        {
            $this->load( $sentence );
        }
    }

    public function load( $sentence )
    {
        $length          = count( $sentence );

        // First line init (words)
        for( $i = 0; $i < $length; $i++ )
        {
            $this->matrix[0][$i] = array( $sentence[$i] );
        }

        // Second line init (candidates tags)
        for( $i = 0; $i < $length; $i++ )
        {
            $this->matrix[1][$i] = $this->grammar->leftOf( $this->matrix[0][$i] );
        }

        // Rest of matrix init (with empty arrays)
        for( $i = 2; $i <= $length; $i++ )
            for( $j = 0; $j <= ( $length - $i ); $j++ )
                $this->matrix[$i][$j] = array();

        //! Applying CYK algorithm
        for( $num_row = 2; $num_row < $length + 1; $num_row++ )
        {
            for( $num_col = 0; $num_col < ( $length - $num_row + 1 ); $num_col++)
            {
                // Looking for rules productions
                for( $k = 0; $k < ( $num_row - 1 ); $k++ )
                {

                    $candidates_col  = $this->matrix[$num_row - $k - 1][$num_col];
                    $candidates_diag = $this->matrix[$k + 1][$num_col + $num_row - 1 - $k];
                    if( !empty( $candidates_col ) && !empty( $candidates_diag ) )
                    {
                        $productions = array();

                        foreach( $candidates_col as $candidate_col )
                            foreach( $candidates_diag as $candidate_diag )
                                $productions = array_merge( $this->grammar->leftOf( array( $candidate_col, $candidate_diag ) ), $productions );

                        foreach( $productions as $production )
                        {
                            if( !in_array( $production, $this->matrix[$num_row][$num_col] ) )
                                $this->matrix[$num_row][$num_col][] = $production;
                        }
                    }
                }
            }
        }
    }
}
?>
