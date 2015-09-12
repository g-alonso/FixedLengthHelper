# FixedLengthHelper

[![Build Status](https://travis-ci.org/g-alonso/FixedLengthHelper.svg?branch=master)](https://travis-ci.org/g-alonso/FixedLengthHelper)
[![Coverage Status](https://coveralls.io/repos/g-alonso/FixedLengthHelper/badge.svg?branch=master&service=github)](https://coveralls.io/github/g-alonso/FixedLengthHelper?branch=master)

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

use Galonso/FixedLengthHelper/Parser;

$config = array(
    "Name" => 30,
    "Age" => 3,
    "Email" => 100
);

$parser = new Parser("myfile.txt", $config);

$data = $parser->extract();

```

## TODO
Add Writer
