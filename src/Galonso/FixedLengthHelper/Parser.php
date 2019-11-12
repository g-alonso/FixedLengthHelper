<?php

/**
* This class contains the Parser Class
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
use InvalidArgumentException;
use RuntimeException;

/**
* Parser
*
* @package   Parser
* @author    Gabriel Alonso <gbr.alonso@gmail.com>
* @copyright 2015 Galonso
* @license   WTFPL - http://www.wtfpl.net/txt/copying/
* @link      https://github.com/g-alonso/FixedLengthHelper
*/
class Parser
{
    /**
     * File Data
     * @var string
     */
    private $fileData;

    /**
     * Config
     * @var array
     */
    private $config = array();

    /**
     * Constructor
     *
     * @param string $file   file path
     * @param array  $config configuration array("name" => 22) // field name => size
     *
     * @throws Exception
     */
    public function __construct($file, $config)
    {
        if (!is_string($file) || !file_exists($file)) {
            throw new InvalidArgumentException(
                "Expects parameter 1 to be a valid file path"
            );
        }

        if (!is_readable($file)) {
            throw new RuntimeException("Unable to read file $file");
        }

        $fileData = file($file);

        $this->fileData = $fileData;
        $this->config = $config;
    }

    /**
     * Extract
     *
     * @return Array
     */
    public function extract()
    {
        $return = array();

        foreach ($this->fileData as $line) {
            if (!empty($line)) {
                $row = array();
                $start = 0;
                foreach ($this->config as $field => $length) {
                    $row[$field] = trim(mb_substr($line, $start, $length));
                    $start += $length;
                }
                $return[] = $row;
            }
        }

        return $return;
    }
}
