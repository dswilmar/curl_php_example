<?php

namespace Src\Services;

class DocumentSender
{
    public static function sendDocument($doc)
    {
        $api = new Api();
        if ($api->login('eve.holt@reqres.in', 'cityslicka')) {
            $docData = ['name' => $doc['name'], 'job' => $doc['description']];
            $createdDoc = $api->post($docData);
            print_r($createdDoc);
        }                
    }
}