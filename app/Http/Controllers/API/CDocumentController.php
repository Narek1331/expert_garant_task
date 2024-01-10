<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DocumentService;
use App\Http\Requests\StoreDocument;

class CDocumentController extends Controller
{

    /**
     * Create a new DocumentService instance.
     *
     * @return void
     */
    public function __construct(DocumentService $document_service)
    {
        $this->document_service = $document_service;
    }

    /**
     * Get documents.
     */
    public function index(){
        $documents = $this->document_service->all();

        return response()->json([
            'status' => true,
            'data' => $documents
        ],200);
    }

    /**
     * Create document.
     */
    public function store(StoreDocument $request){
        $document = $this->document_service->store($request->name,$request->content);

        return response()->json([
            'status' => true,
            'data' => $document
        ],201);
    }

    /**
     * Edit document.
     */
    public function edit(int $document_id, StoreDocument $request){
        $document = $this->document_service->edit($document_id,$request->name,$request->content);

        return response()->json([
            'status' => true,
            'data' => $document
        ],200);
    }

    /**
     * Destroy document.
     */
    public function destroy(int $document_id){
        $this->document_service->destroy($document_id);

        return response()->json([
            'status' => true,
        ],200);
    }


}
