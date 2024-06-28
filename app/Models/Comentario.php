<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'publication_id',
        'created_by',
        'content',
    ];

    public function publication()
    {
        return $this->belongsTo(Publicacion::class, 'publication_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



}
