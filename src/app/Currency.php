<?php
namespace app;

class Currency 
{
    public function parseArrayXml(string $link): object
    {
        return simplexml_load_file($link);
    }

    public function saveElemXml(object $xml, Bd $bd)
    {
        
        foreach ($xml as  $currencyXml) {
            $currency['name'] = (array)$currencyXml->CharCode;
            $currency['rate'] = (array)$currencyXml->Value;
            $bd->insert($currency);
            
        }

    }
}
