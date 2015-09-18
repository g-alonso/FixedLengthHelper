# FixedLengthHelper

[![Build Status](https://travis-ci.org/g-alonso/FixedLengthHelper.svg?branch=master)](https://travis-ci.org/g-alonso/FixedLengthHelper)
[![Coverage Status](https://coveralls.io/repos/g-alonso/FixedLengthHelper/badge.svg?branch=master&service=github)](https://coveralls.io/github/g-alonso/FixedLengthHelper?branch=master)

## About

The `FixedLengthHelper` is a helper to parse and write fixed-length text records.

## Requirements

PHP 5.3

## Parser Usage

```
<?php

require_once "src/Galonso/FixedLengthHelper/Parser.php";

use Galonso/FixedLengthHelper/Parser;

/**
* @var $config FieldName => Length
*/

$config = array(
    "Name" => 30,
    "Age" => 3,
    "Email" => 100
);

$parser = new Parser("myfile.txt", $config);

$data = $parser->extract();

```

## Writer Usage

```

require_once "src/Galonso/FixedLengthHelper/Writer.php";

use Galonso/FixedLengthHelper/Writer;

$writer = new Writer(
            array( 
                0 => array("nombre" => "Carlos", "apellido" => "Gardel"), 
                1 => array("nombre" => "Diego", "apellido" => "Maradona")
            ),
            array("nombre" => 10, "apellido" => 10)
        );

$writer->write(__DIR__."/file.txt");

```

## TODO
Add Validations
