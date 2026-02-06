<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    // Field has many news
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
