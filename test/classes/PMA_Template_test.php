<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Test for PMA\Template class
 *
 * @package PhpMyAdmin-test
 */

require_once 'libraries/Template.class.php';

/**
 * Test for PMA\Template class
 *
 * @package PhpMyAdmin-test
 */
class PMA_Template_test extends PHPUnit_Framework_TestCase
{
    public function testStaticRender()
    {
        $this->assertEquals(
            'static content',
            PMA\Template::get('test/static')->render()
        );
    }

    public function testDynamicRender()
    {
        $this->assertEquals(
            'value',
            PMA\Template::get('test/echo')->render(array(
                'variable' => 'value'
            ))
        );
    }

    public function testTrim()
    {
        $html = file_get_contents(PMA\Template::BASE_PATH.'test/trim.phtml');

        $this->assertEquals(
            'outer <element>value</element> value',
            PMA\Template::trim($html)
        );
    }
}
