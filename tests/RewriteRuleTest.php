<?php
class RewriteRuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RewriteRule
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new RewriteRule("A","B","C");
    }

    protected function tearDown()
    {
    }

    /**
     * @todo Implement test__toString().
     */
    public function test__toString()
    {
        $this->assertEquals("{$this->object}", "A -> B C");
    }
}
?>
