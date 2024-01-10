<?php
namespace App\Services;
use App\Models\Document;
use App\Enums\DocumentSendMailEnum;
use App\Notifications\Document as DocumentNotification;

class DocumentService{

    /**
     * Get all documents.
     */
    public function all(){
        return Document::with('users')->get();
    }

    /**
     * Create document.
     */
    public function store($name, $content){
        return Document::create([
            'name' => $name,
            'content' => $content,
        ]);
    }


    /**
     * Send mail nitification.
     */
    private function sendMail($users, $name, DocumentSendMailEnum $type){

        if($type->value == 'edit'){
            $messgae = 'This document was changed - ' . $name;
        }else{
            $messgae = 'This document was destroyed - ' . $name;
        }

        foreach($users as $user){
            $user->notify(new DocumentNotification($messgae));
        }
    }

    /**
     * Edit document.
     */
    public function edit(int $id,string $name,string $content){

        $document = Document::findOrFail($id);

        if(!$document->prevContent){
            $document->prevContent()
            ->create([
                'content' => $document->content
            ]);
        }else{
            $document->prevContent()
            ->update([
                'content' => $document->content
            ]);
        }

        $document->name = $name;
        $document->content = $content;

        $document->save();

        $this->sendMail($document->users,$document->name,DocumentSendMailEnum::edit);

        return $document;

    }

     /**
     * Destroy document.
     */
    public function destroy(int $id){

        $document = Document::findOrFail($id);
        $this->sendMail($document->users,$document->name,DocumentSendMailEnum::delete);
        return $document->delete();

    }

}

?>
