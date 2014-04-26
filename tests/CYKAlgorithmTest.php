<?php
namespace charlycoste/NLPHP;

class CYKAlgorithmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CYKAlgorithm
     */
    protected $object;

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

        $this->object = new CYKAlgorithm($gram);
    }

    protected function tearDown()
    {
    }

    public function testIsValid()
    {
        $this->object->load(array('le', 'chat', 'mange', 'la', 'souris'));
        $this->assertTrue($this->object->validate('PH'));
    }
}
