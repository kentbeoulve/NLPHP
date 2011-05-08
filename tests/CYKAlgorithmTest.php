<?php
class CYKAlgorithmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var CYKAlgorithm
     */
    protected $object;

    protected function setUp()
    {
        $gram = new ChomskyNormalForm();

        $gram->addRule( new RewriteRule( "DET", "le" ) );
        $gram->addRule( new RewriteRule( "DET", "la" ) );
        $gram->addRule( new RewriteRule( "SN", "chat" ) );
        $gram->addRule( new RewriteRule( "SN", "souris" ) );
        $gram->addRule( new RewriteRule( "V", "mange" ) );
        $gram->addRule( new RewriteRule( "GN", "DET", "SN" ) );
        $gram->addRule( new RewriteRule( "PH", "GN", "GV" ) );

        $this->object = new CYKAlgorithm( $gram );
    }

    protected function tearDown()
    {
    }

    public function testIsValid()
    {
        $test = array( 'le', 'chat', 'mange', 'la', 'souris' );
        $this->object->load( $test );
        $this->assertTrue( $this->object->validate( 'PH' ) );
    }
}
?>
