<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'title',
        'content',
        'published_by',
        'resources',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [];

    public function published_by()
    {
        return $this->belongsTo(UserProfile::class, 'published_by', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'publication_id')->with('user')->select('publication_id', 'content', 'created_at', 'updated_at');
    }

    public function social_events()
    {
        return $this->hasMany(SocialEvent::class, 'publication_id')->with('country');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'publication_id')->with('user')->select('reaction_by', 'type');
    }
    public function resources()
    {
        return $this->hasMany(Resource::class, 'publication_id');
    }
}
