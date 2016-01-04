<?php
/**
 * This class contains the Writer Class
 *
 * PHP version 5.3+
 *
 * @package   Writer
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthHelper
 */
namespace Galonso\FixedLengthHelper;

use RuntimeException;

/**
 * Writer
 *
 * @package   Writer
 * @author    Gabriel Alonso <gbr.alonso@gmail.com>
 * @copyright 2015 Galonso
 * @license   WTFPL - http://www.wtfpl.net/txt/copying/
 * @link      https://github.com/g-alonso/FixedLengthHelper
 */
class Writer
{
    /**
     * Data
     * @var array
     */
    private $data;

    /**
     * Map
     * @var array
     */
    private $map = array();

    /**
     * Constructor
     *
     * @param array $data
     * @param array $map
     * @throws \Exception
     */
    public function __construct($data, $map)
    {
        $this->data = $data;
        $this->map  = $map;

        foreach ($this->data as $k => $data) {
            foreach ($this->map as $field => $length) {
                if (array_key_exists($field, $data) === false) {
                    throw new \Exception("Invalid configuration. Field $field not found.");
                }
            }
        }
    }

    /**
     * Write
     *
     * @param $file
     * @return true
     * @throws \Exception
     */
    public function write($file)
    {
        if (!is_writable(dirname($file))) {
            throw new RuntimeException("Could not write!");
        }

        $content = "";

        foreach ($this->data as $k => $v) {
            foreach ($this->map as $field => $length) {
                $content .= str_pad($v[$field], $length, " ", STR_PAD_RIGHT);
            }
            $content .= "\n";
        }

        $fp = fopen($file, 'w+');
        fputs($fp, $content);
        fclose($fp);

        return true;
    }
}
