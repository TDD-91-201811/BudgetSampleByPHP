<?php

require __DIR__.'/../vendor/autoload.php';

$text = 'Hello, world. http://www.facebook.com';

$linker = new \App\Utilities\Linker();
$output = $linker->autolink($text);

echo $output.PHP_EOL;
