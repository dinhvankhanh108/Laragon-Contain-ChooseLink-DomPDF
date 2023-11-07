<?php
require_once 'autoload.inc.php'; // Adjust the path as per your project's setup

use Dompdf\Dompdf;
use Dompdf\Options;

$root = realpath(__DIR__);
// echo sys_get_temp_dir() . "<br>";
// $root =  realpath(__DIR__) . "/lib/fonts";
// die();

$fontDir = __DIR__ . '/fonts/';
// $font = 'Meiryo_Bold.ttf';
// $font = 'ipam.ttf';
$font = 'meiryo.ttf';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('isJavascriptEnabled', true);
$options->set("isPhpEnabled", true);

// $options->set('isFontSubsettingEnabled', true);
$options->set('fontDir', $root . '/fonts'); // Replace with the actual font directory path
$options->set('fontCache', $root . '/fonts'); // Replace with the actual font directory path
$options->set('defaultFont', $font);
// $dompdf->set_option('fontDir', $fontDir);
// $dompdf->set_option('defaultFont', $font);
$dompdf = new Dompdf($options);
$a = "page1";
$html = <<<HTML
		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" /> -->
		<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
		<style>
			/* @font-face {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
				font-style: italic;
			}

			@font-face {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
				font-style: normal;
			} */

			* {
				/* color: red; */
				font-size:12px;
				font-weight: normal;
				font-style: normal;
			}

			.bold {
				font-family: "Meiryo_Bold.ttf";
				src: url("./fonts/Meiryo_Bold.ttf");
				font-weight: bold;
			}

			/* @page {
					margin: 180px 50px;
				} */

			.container {
				margin-left:40px;
				margin-top: -40px
			}

			#header {
				/* position: fixed; */
				/* left: 0px; */
				/* top: -180px; */
				/* right: 0px; */
				/* height: 150px; */
				/* background-color: orange; */
				/* text-align: center; */
			}

			#footer {
				position: fixed;
				left: 0px;
				bottom: -40px;
				right: 0px;
				height: 150px;
				/* background-color: lightblue; */
			}

			.header-1 {
				display: block;
				/* text-align: end; */
				text-decoration: underline;
				float: right;
				/* padding: 20px; */
			}

			.header-2 {
				display: block;
				text-align: center;
				/* text-decoration: underline; */
				clear: both;
				/* padding: 20px; */
			}

			/* .content--left {
				width: 70%;
			}

			.content--right {
				width: 70%;
			} */

			#footer .page:after {
					/* content: counter(page, upper-roman); */
					content: counter(page)
			}

			.content__table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}

			.content__table, th, td:nth-child(1){
				width:40px;
				text-align: center; 
				/* vertical-align: middle; */
			}

			.content{
				display: table;
				width: 100%;
			}

			.content--left {
				display: table-cell;
				width: 70%;
				padding-right: 20px;
			}

			.content--right {
				display: table-cell;
				width: 30%;
			}

			.footer__table {
				display: table;
				width: 100%;
				height: 100px;

			}

			.footer__table--left {
				display: table-cell;
				width: 25%;
				
				/* text-align: center;
				vertical-align: middle; */
				/* margin: 0; */
				/* position: absolute; */
				/* top: 50%; */
				/* -ms-transform: translateY(-50%); */
				/* transform: translateY(-50%); */
				/* padding-right: 20px; */
			}

			.footer__table--center {
				display: table-cell;
				width: 30%;
			}

			.footer__table--right {
				display: table-cell;
				/* width: 30%; */
			}
			.footer__table .page-1 {
				border: solid;
				height: 80px;
				width: 80px;
				position: relative;
				/* margin-left: 20px; */
			}

			.footer__position {
				position: absolute;
				top: 18%;
				transform: translate(0, -50%);
				padding: 15px;
			}

			.footer__table .page-2 {
				height: 80px;
				width: 350px;
			}

			.footer__table .page-3 {
				border: solid;
				width: 70px;
				height: 70px;
				margin-left: 40px;

			}

			.footer__table--center .spacing {
				padding-left: 30px;
			}

			p {
				line-height: 5px;
			}

			.footer__table .page-2 p {
				line-height: 1px;
			}

			.center {
				border: 5px solid;
				position: absolute;
				top: 40%;
				left: 40%;
				transform: translate(-50%, -50%);
				text-align: center;
			}


		</style>

		<body>
			<div class="center">
				<p>This div is horizontally and vertically centered.</p>
			</div>
		</body>
		</html>
HTML;


$dompdf->loadHtml($html);
$dompdf->setPaper('A5', 'landscape');
// $dompdf->setPaper( 'A4', 'portrait' );
$dompdf->render();
$dompdf->stream('document.pdf', array("Attachment" => false));

