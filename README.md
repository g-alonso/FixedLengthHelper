# FixedLengthHelper

[![Build Status](https://travis-ci.org/g-alonso/FixedLengthParser.svg)](https://travis-ci.org/g-alonso/FixedLengthParser)
[![Coverage Status](https://coveralls.io/repos/g-alonso/FixedLengthParser/badge.svg?branch=master&service=github)](https://coveralls.io/github/g-alonso/FixedLengthParser?branch=master)

## About

The `FixedLengthHelper` class is a ~~read-only~~ helper to parse fixed-length text records.

## Requirements

PHP 5.3

## Usage

```

require_once "src/Galonso/FixedLengthHelper/Parser.php";

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
