<?php
namespace NLPHP;

/**
 * Cocke–Younger–Kasami Algorithm
 *
 * This class implements the CYK Algorithm.
 * You must instanciate it with a ChomskyNormalForm grammar as parameter
 * then you can load a sentence which must be an array.
 */
class CYKAlgorithm
{
    private $grammar;
    public $matrix;

    public function __construct(ChomskyNormalForm $grammar)
    {
        $this->grammar = $grammar;
    }

    public function validate($symbol)
    {
        return in_array($symbol, $this->matrix[count($this->matrix)-1][0]);
    }

    /**
     * Initialize the first line of the matrix
     */
    private function firstLineInit(array $sentence)
    {
        $this->matrix[0] = array_map(

            function($word){

                return array($word);
            },

            $sentence
        );
    }

    /**
     * Initialize the second line of the matrix
     */
    private function secondLineInit()
    {
        $gram = $this->grammar; // PHP 5.3 can't access $this in closures

        $this->matrix[1] = array_map(

            function ($word) use ($gram) {

                return $gram->leftOf($word);
            },

            $this->matrix[0]
        );
    }

    /**
     * Initialization of empty cells with empty arrays
     */
    private function emptyCellsInit($length)
    {
        for ($i = 2; $i <= $length; $i++) {

            $this->matrix[$i] = array_fill(0, $length - $i + 1, array());
        }

    }

    public function load($sentence)
    {
        $length  = count($sentence);

        // 1. Init first line
        $this->firstLineInit($sentence);

        // 2. Init first line
        $this->secondLineInit();

        // 3. Init the rest of matrix
        $this->emptyCellsInit($length);

        //! Applying CYK algorithm
        for ($num_row = 2; $num_row < $length + 1; $num_row++) { // rows

            for ($num_col = 0; $num_col < ($length - $num_row + 1); $num_col++) { // columns

                // Looking for rules productions
                for ($k = 0; $k < ($num_row - 1); $k++) {

                    $candidates_col  = $this->matrix[$num_row - $k - 1][$num_col];
                    $candidates_diag = $this->matrix[$k + 1][$num_col + $num_row - 1 - $k];

                    if (!empty($candidates_col) && !empty($candidates_diag)) {

                        $productions = array();

                        foreach ($candidates_col as $candidate_col) {

                            foreach ($candidates_diag as $candidate_diag) {

                                $productions = array_merge($this->grammar->leftOf(array($candidate_col, $candidate_diag)), $productions);
                            }
                        }

                        foreach ($productions as $production) {

                            if (!in_array($production, $this->matrix[$num_row][$num_col])) {

                                $this->matrix[$num_row][$num_col][] = $production;
                            }
                        }
                    }
                }
            }
        }
    }
}
