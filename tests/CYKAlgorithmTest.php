<?php
namespace NLPHP;

use PHPUnit_Framework_TestCase;

class CYKAlgorithmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CYKAlgorithm
     */
    protected $algorithm;

    protected function setUp()
    {
        $gram = new ChomskyNormalForm();

        $gram->addRule(new RewriteRule("DET", "le"));
        $gram->addRule(new RewriteRule("DET", "la"));
        $gram->addRule(new RewriteRule("SN", "chat"));
        $gram->addRule(new RewriteRule("SN", "souris"));
        $gram->addRule(new RewriteRule("V", "mange"));
        $gram->addRule(new RewriteRule("GV", "V", "GN"));
        $gram->addRule(new RewriteRule("GN", "DET", "SN"));
        $gram->addRule(new RewriteRule("PH", "GN", "GV"));

        $this->algorithm = new CYKAlgorithm($gram);
    }

    protected function tearDown()
    {
    }

    public function testValidate()
    {
        $phrase = array('le', 'chat', 'mange', 'la', 'souris');

        $this->algorithm->load($phrase);

        $ok = $this->algorithm->validate('PH');

        $this->assertTrue($ok);
    }

    public function testUnvalidate()
    {
        $phrase = array('le', 'chat', 'mange', 'souris');

        $this->algorithm->load($phrase);

        $ok = $this->algorithm->validate('PH');

        $this->assertFalse($ok);
    }
}
