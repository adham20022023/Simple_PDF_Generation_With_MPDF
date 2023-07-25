<?php

require_once __DIR__ . '/vendor/autoload.php';
echo "hi";
$mpdf = new \Mpdf\Mpdf(['mode'=>'utf-8','format'=>[250,260]]);
$mpdf->autoScriptToLang=true;
$mpdf->autoLangToFont=true;
$mpdf->AddPage("L");
$stylesheet=file_get_contents('style.css');
$mpdf->writeHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
    session_start();
    $message=$_SESSION['html'];
    $mpdf->WriteHTML($message,\Mpdf\HTMLParserMode::HTML_BODY);
    $mpdf->Output('mypdf.pdf','D');
    unset($_SESSION['html']);







?>