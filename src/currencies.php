<?php
require "vendor/autoload.php";
$currency = new app\Currency();
$bd = new app\Bd('db', 'test', 'root', 'test');
$bd->connect();
$objectXml = $currency->parseArrayXml('http://www.cbr.ru/scripts/XML_daily.asp');
$currency->saveElemXml($objectXml, $bd);
echo json_encode($bd->select('currency'));

