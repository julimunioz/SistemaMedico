<?php

	require_once('../../libs/mpdf/vendor/autoload.php');
	require_once('../../vista/consultas/ticket.php');

	$mpdf = new \Mpdf\Mpdf([
	    "format" => "A4"
	]);

	$css = file_get_contents('../../css/recibo.css');
	$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
	$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);

?>




