<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id',
        'attachment_id',
        'title',
        'author',
        'isbn',
        'description',
    ];

    public function attachment()
    {
        return $this->belongsTo('\App\Models\Attachment', 'attachment_id');
    }
}
