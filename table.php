<?php
require_once 'autoload.inc.php'; // Adjust the path as per your project's setup

use Dompdf\Dompdf;
use Dompdf\Options;

$root = realpath(__DIR__);
// echo sys_get_temp_dir() . "<br>";
// $root =  realpath(__DIR__) . "/lib/fonts";
// die();

$fontDir = __DIR__ . '/fonts/';
$font = 'meiryo.ttf';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
// $options->set('isFontSubsettingEnabled', true);
$options->set('fontDir', $root . '/fonts'); // Replace with the actual font directory path
$options->set('fontCache', $root . '/fonts'); // Replace with the actual font directory path
$options->set('defaultFont', $font);
// $dompdf->set_option('fontDir', $fontDir);
// $dompdf->set_option('defaultFont', $font);
$dompdf = new Dompdf($options);
$a = "page1";
$html = <<<HTML
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<style>
table { border-collapse: separate; border-spacing: 5px; margin: 1px; border: 1px solid black; }
td { border: 1px solid grey; width: 10px; height: 10px; padding: 2px;}
td td { border: 1px solid green; }
td td td { border: 1px solid red; }
</style>
</head>
<body>

<table>
<tr>
<td>
  <table>
  <tr>
  <td>foo</td>
  </tr>
  <tr>
  <td>bar</td>
  </tr>
  </table>
</td>
</tr>
</table>

<table style="margin-top: 1em; width: 300px;">
<tr>
<td>
  <table>
  <tr>
  <td>
    <table>
    <tr>
    <td colspan="2">a</td>
    </tr>
    <tr>
    <td>b</td>
    <td>c</td>
    </tr>
    </table>
  </td>
  <td rowspan="2">d</td>
  </tr>
  <tr>
  <td>e</td>
  </tr>
  </table>
</td> 
<td>f</td>
</tr>
<tr>
<td>g</td>
<td>h</td>
</tr>
</table>    

</body>
</html>
HTML;
$dompdf->loadHtml($html);
$dompdf->setPaper('A5', 'landscape');
// $dompdf->setPaper( 'A5', 'portrait' );
$dompdf->render();
$dompdf->stream('document.pdf', array("Attachment" => false));

// $dompdf->stream('document.pdf');

/* *{ font-family: 'Noto Sans Japanese'} */
/* .m {
    font-family: 'Montserrat';
}

.t {
    font-family: 'Tangerine';
} */