<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'c_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content'
    ];

    /**
     * Get the previous content.
     */
    public function prevContent()
    {
        return $this->hasOne(DocumentPreviousContent::class);
    }

    /**
     * The users that belong to the document.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'c_users_documents','document_id','user_id');
    }
}
