<?php

require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf(__DIR__ .'\\library\\wkhtmltopdf\\bin\\wkhtmltopdf.exe');

// $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

// or you can do it in two steps
// $snappy = new Pdf();
// $snappy->setBinary('/usr/local/bin/wkhtmltopdf');



header('Content-Type: application/pdf');
echo $snappy->getOutput('http://localhost/Practice/pdf/testpage.php?token=abc');