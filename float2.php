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
		<style>
	.column1, .column2, .column3 {
		float: left;
		width: 33.33%;
		box-sizing: border-box;
	}
	
	/* Apply styles to the columns */
	.column1 {
		background-color: red;
	}
	
	.column2 {
		background-color: green;
	}
	
	.column3 {
		background-color: blue;
	}
	
</style>
<div class="container">
  <div class="column1">Column 1</div>
  <div class="column2">Column 2</div>
  <div class="column3">Column 3</div>
</div>
HTML;
$dompdf->loadHtml($html);
$dompdf->setPaper('A5', 'landscape');
// $dompdf->setPaper( 'A5', 'portrait' );
$dompdf->render();
$dompdf->stream('document.pdf', array("Attachment" => false));
// $dompdf->stream('document.pdf');