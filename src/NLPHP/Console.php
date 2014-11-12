<?php
namespace NLPHP;

use ezcConsoleOutput;
use ezcConsoleTable;

/**
 * This class purpose is to handle console inputs and outputs.
 */
class Console
{
    private $output;
    private $table;

    public function __construct()
    {
        $this->output = new ezcConsoleOutput();
        $this->output->formats->headBorder->color = 'blue';
        $this->output->formats->normalBorder->color = 'gray';
        $this->output->formats->headContent->color = 'blue';
        $this->output->formats->headContent->style = array('bold');

        $this->table = new ezcConsoleTable($this->output, 78);

        $this->table->options->defaultBorderFormat = 'normalBorder';

        $this->table[0]->borderFormat = 'headBorder';
        $this->table[0]->format       = 'headContent';
        $this->table[0]->align        = ezcConsoleTable::ALIGN_CENTER;
    }

    public function outputTable(array $rows)
    {
        foreach ($rows as $row => $cells) {

            foreach ($cells as $k => $cell) {

                $this->table[$row][$k]->content = $cell;
            }
        }

        $this->table->outputTable();
        $this->output->outputLine();
    }

    public function outputCYKMatrix($matrix)
    {
        $table = array();

        foreach ($matrix as $row => $cells) {

            foreach ($cells as $k => $cell) {

                $table[$row][$k] = implode('|', $cell);
            }
        }

        $this->outputTable($table);
    }

    public static function main()
    {
        // 1. Instanciate a generic ChomskyNormalForm
        $grammar = new ChomskyNormalForm();

        // 2. Configure the grammar
        $rules = array(
            new RewriteRule("DET", "le"),
            new RewriteRule("DET", "la"),
            new RewriteRule("SN", "chat"),
            new RewriteRule("SN", "souris"),
            new RewriteRule("V", "mange"),
            new RewriteRule("GN", "DET", "SN"),
            new RewriteRule("GV", "V", "GN"),
            new RewriteRule("PH", "GN", "GV")
        );

        foreach ($rules as $rule) {

            $gram->addRule($rule);
        }
 
        // 3. Instanciate a CYK algorithm matrix
        $cyk = new CYKAlgorithm($grammar);

        // 4. Load a phrase in the matrix
        $cyk->load(
            array('le', 'chat', 'mange', 'la', 'souris')
        );

        // 5. Output the matrix
        $this->outputCYKMatrix($cyk->matrix);

        // new line
        $this->output->outputLine();
    }
}
