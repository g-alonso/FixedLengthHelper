<?php
/**
 * This class contains the Writer Test Class
 *
 * PHP version 5.3+
 *
 * @package   Parser
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthHelper
 */
namespace Galonso\FixedLengthHelper;

/**
 * WriterTest
 *
 * @package   Parser
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthHelper
 */
class WriterTest  extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    public static function setUpBeforeClass()
    {

    }

    /**
     * @expectedException \Exception
     */
    public function testConstructorException()
    {
        $writer = new Writer(array( 0 => array("a" => "zz")), array("a" => 2, "b" => 3));
    }

    public function testWriter()
    {
        $writer = new Writer(
            array( 0 => array("nombre" => "Pepe", "apellido" => "Argento")),
            array("nombre" => 10, "apellido" => 10)
        );

        $writer->write(__DIR__."/writer_test.txt");

        $this->assertTrue(file_exists(__DIR__."/writer_test.txt"));

        unlink(__DIR__."/writer_test.txt");
    }
}