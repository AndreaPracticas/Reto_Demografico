<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    // enable default timestamp columns (created_at, updated_at)

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'field_id',
        'user_id',
        'image',
        'title',
        'description',
        'link',
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
