<?php
namespace NLPHP;

use ezcConsoleOutput;
use ezcConsoleTable;

/**
 * This class purpose is to handle console inputs and outputs.
 */
class Console
{
    public static function main()
    {
        $gram = new ChomskyNormalForm();

        $gram->addRule(new RewriteRule("DET", "le"));
        $gram->addRule(new RewriteRule("DET", "la"));
        $gram->addRule(new RewriteRule("SN", "chat"));
        $gram->addRule(new RewriteRule("SN", "souris"));
        $gram->addRule(new RewriteRule("V", "mange"));
        $gram->addRule(new RewriteRule("GN", "DET", "SN"));
        $gram->addRule(new RewriteRule("GV", "V", "GN"));
        $gram->addRule(new RewriteRule("PH", "GN", "GV"));

        $test = array('le', 'chat', 'mange', 'la', 'souris');

        $cyk = new CYKAlgorithm($gram);

        $cyk->load($test);

        $output = new ezcConsoleOutput();

        $output->formats->headBorder->color = 'blue';
        $output->formats->normalBorder->color = 'gray';
        $output->formats->headContent->color = 'blue';
        $output->formats->headContent->style = array('bold');

        $table = new ezcConsoleTable($output, 78);
        $table->options->defaultBorderFormat = 'normalBorder';

        $table[0]->borderFormat = 'headBorder';
        $table[0]->format       = 'headContent';
        $table[0]->align        = ezcConsoleTable::ALIGN_CENTER;

        foreach ($cyk->matrix as $row => $cells) {

            foreach ($cells as $k => $cell) {

                $table[$row][$k]->content = implode('|', $cell);
            }
        }

        $output->outputLine('eZ components team:');
        $table->outputTable();
        $output->outputLine();
    }
}
Console::main();
