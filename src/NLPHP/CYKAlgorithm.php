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

    public function load($sentence)
    {
        $length  = count($sentence);

        // First line init (words)
        $this->matrix[0] = array_map(
            function ($word) {
                return array($word);
            },
            $sentence
        );

        // Second line init (candidates tags)
        $gram = $this->grammar;

        $this->matrix[1] = array_map(
            function ($word) use ($gram) {    // PHP 5.3 can't access $this in closures
                return $gram->leftOf($word);
            },
            $this->matrix[0]
        );

        unset($gram);

        // Rest of matrix init (with empty arrays)
        for ($i = 2; $i <= $length; $i++) {

            $this->matrix[$i] = array_fill(0, $length - $i + 1, array());
        }

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
