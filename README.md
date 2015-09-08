# FixedLengthParser

## About

The `FixedLengthParser` class is a read-only helper to parse fixed-length text records.

## Requirements

PHP 5.3

## Usage

```

require_once "src/FixedLengthParser/Parser.php";

/**
* @var $config FieldName => Size
*/

$config = array(
    "Name" => 30,
    "Age" => 3,
    "Email" => 100
);

$parser = new Parser("myfile.txt", $config);

$data = $parser->extract();


```