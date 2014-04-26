<?php
namespace NLPHP;

use PHPUnit_Framework_TestCase;

class DateParserTest extends PHPUnit_Framework_TestCase
{
    private $grammar;

    public function setUp()
    {
        $this->grammar = new ChomskyNormalForm();

        // terminal symbols
        $this->grammar->addRule(new RewriteRule("ARTICLE", "le"));
        $this->grammar->addRule(new RewriteRule("JOUR", "jeudi"));
        $this->grammar->addRule(new RewriteRule("MOIS", "mai"));
        $this->grammar->addRule(new RewriteRule("NOMBRE", "12"));
        $this->grammar->addRule(new RewriteRule("NUM_JOUR", "12"));
        $this->grammar->addRule(new RewriteRule("NOMBRE", "2011"));
        $this->grammar->addRule(new RewriteRule("NUM_ANNEE", "2011"));

        $this->grammar->addRule(new RewriteRule("ARTICLE_JOUR", "ARTICLE", "JOUR"));
        $this->grammar->addRule(new RewriteRule("ARTICLE_JOUR_NUM", "ARTICLE_JOUR", "NUM_JOUR"));

        $this->grammar->addRule(new RewriteRule("MOIS_ANNEE", "MOIS", "NUM_ANNEE"));

        $this->grammar->addRule(new RewriteRule("DATE", "ARTICLE_JOUR_NUM", "MOIS_ANNEE"));

        $this->cyk = new CYKAlgorithm($this->grammar);
        $this->cyk->load(array('le', 'jeudi', '12', 'mai', '2011'));
    }

    public function testA1()
    {
        $this->assertTrue($this->cyk->validate('DATE'));
    }


    public function provider()
    {
        //Samedi 26 avril 2014 à 10h30
        //du vendredi 24 janvier au dimanche 27 avril 2014
    }
}
