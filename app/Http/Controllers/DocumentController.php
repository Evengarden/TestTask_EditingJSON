<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return Docs::all();
    }

    public function showDocument(Docs $document)
    {
        if ($document) {
            return $document;
        }
        abort(404);
    }

    public function createDraftDocument(Request $request)
    {
        $createdDoc = Docs::create(['payload' => [], 'id' => Str::uuid()]);
        return Docs::find($createdDoc->id);
    }

    public function editDocument(Request $request, Docs $document)
    {
        if($document->status == 'published'){
            abort(404);
        }
        $jsonData = json_encode($request->getContent());
        $data = json_decode($jsonData,true);
        $document->payload = $data;
        $document->save();
        return $document;
    }
    public function publishDocument(Docs $document)
    {
        $document->status = 'published';
        $document->save();
        return $document;
    }
}
