<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'field_id',
        'user_id',
        'image',
        'title',
        'description',
    ];

    // News belongs to a field
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // News belongs to a user (author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
