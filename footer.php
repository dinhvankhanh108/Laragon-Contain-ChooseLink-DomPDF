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

$html = <<<HTML
		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" /> -->
		<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
		<style>
			.footer .page-number:after { content: counter(page); }
			</style>
			<div class="footer fixed-section">
			<div class="right">
				<span class="page-number">Page </span>
			</div>
			</div>
				</html>
		HTML;
$dompdf->loadHtml($html);
$dompdf->setPaper( 'A5', 'landscape' );
// $dompdf->setPaper( 'A5', 'portrait' );
$dompdf->render();
$dompdf->stream('document.pdf', array("Attachment" => false));// $dompdf->stream('document.pdf');

/* *{ font-family: 'Noto Sans Japanese'} */
/* .m {
    font-family: 'Montserrat';
}

.t {
    font-family: 'Tangerine';
} */