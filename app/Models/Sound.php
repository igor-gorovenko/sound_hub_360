<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;

    protected $table = 'sounds';

    protected $fillable = [
        'name',
        'category_id',
        'path',
        'volume',
        'is_playing',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
