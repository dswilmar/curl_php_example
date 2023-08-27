<?php

use Src\Models\Document;
use Src\Services\DocumentSender;

require_once './vendor/autoload.php';

$doc = new Document();
$docs = $doc->getDocuments();

foreach ($docs as $doc) {
    DocumentSender::sendDocument($doc);
}
