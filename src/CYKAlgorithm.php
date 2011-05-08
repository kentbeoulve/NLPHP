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

    public function __toString()
    {
        foreach( $this->matrix as $line )
        {
            foreach( $line as $col )
            {
                echo "[".implode('|',$col)."]";
            }
            echo "\n";
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

                    $candidate_left  = $this->matrix[$num_row - $k - 1][$num_col];
                    $candidate_right = $this->matrix[$k + 1][$num_col + $num_row - 1 - $k];

//                    echo "compare ".implode('|',$candidate_left)." et ".implode('|',$candidate_right)."\n";

/*

                    if( !empty( $candidate_left ) && !empty( $candidate_right ) )
                    {
//                        $this->matrix[$i][$j] = array_merge( $this->matrix[$i][$j], $this->grammar->leftOf( array( $candidate_left, $candidate_right) )  );
                        $this->matrix[$i][$j] = array_merge( $this->matrix[$i][$j], array("A") );
                    }
  //                  $this->matrix[$i][$j] = array("A");
                      if( !in_array( "A",$this->matrix[$i][$j]) )
                          $this->matrix[$i][$j][] = "A";*/
                }
            }
        }
    }
}
?>
