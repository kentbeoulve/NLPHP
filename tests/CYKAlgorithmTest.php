<?php
class CYKAlgorithmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CYKAlgorithm
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new CYKAlgorithm( $gram );
    }

    protected function tearDown()
    {
    }

    public function testIsValid()
    {
        $test = array('le','chat','mange','la','souris','dans','le','jardin');
        $this->object->load( $test );
        $this->assertTrue( $this->object->validate('P') );
    }
}
?>
