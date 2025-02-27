<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'game_commentary'; // Modification du nom de la table
    protected $fillable = ['comment', 'user_id', 'game_id', 'created_at'];
    public $timestamps = false;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
