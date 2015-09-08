<?php
/**
 * This class contains the Parser Test Class
 *
 * PHP version 5.3+
 *
 * @package   Parser
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthParser
 */
namespace FixedLengthParser;

/**
 * ParserTest
 *
 * @package   Parser
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthParser
 */
class ParserTest  extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testArgumentException()
    {
        $inputFile = __DIR__."/not_found.txt";
        $config = array("one" => 1);

        $parser = new Parser($inputFile, $config);
    }

    
    //public function testReadException()
    //{
    //    $inputFile = __DIR__."/denied.txt";
    //    $config = array("one" => 1);
    //
    //    $parser = new Parser($inputFile, $config);
    //}

    public function testReadFile()
    {
        $inputFile = __DIR__ . "/input_1.txt";
        $config = array(
            "one" => 14,
            "two" => 33,
            "three" => 10,
            "four" => 10,
            "five" => 10,
            "six" => 20
        );

        $parser = new Parser($inputFile, $config);

        $data = $parser->extract();

        $this->assertEquals($data[0]["one"], "9898071220921");
        $this->assertEquals($data[0]["two"], "102010034001510814311");
        $this->assertEquals($data[0]["three"], "05000001");
        $this->assertEquals($data[0]["four"], "20161031");
        $this->assertEquals($data[0]["five"], "54976");
        $this->assertEquals($data[0]["six"], "00000101001");
    }
}