<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
  
    protected $fillable = ['user_id', 'title', 'author','about', 'thumbnail'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function ratings()
{
    return $this->hasMany(Rating::class);
}

}
