<?php

	require_once 'generarPdf.php';

	//Se descarga el pdf con un nombre aleatorio
	$mpdf->Output('NombrePDF-'.md5(rand()).'.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>