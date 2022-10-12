<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    
    public function descargar(Document $document)
    {

        //$header =['Content-Type'=>$document->];
        //return $document->documento;
        return Storage::download($document->documento);
    }
}
