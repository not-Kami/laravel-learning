<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'games';
    protected $fillable = [
        'name', 
        'genre', 
        'release_date', 
        'developer', 
        'publisher', 
        'platform', 
        'description',
        'image_url'
    ];
    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany(Commentary::class, 'game_id');
    }
}
