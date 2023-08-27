<?php

namespace Src\Models;
use Src\Database\Connection;

class Document
{
    public function getDocuments()
    {
        $pdo = Connection::getDatabaseConnection();        
        $query = 'SELECT * FROM public.products';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $documents = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $documents;
    }    
}