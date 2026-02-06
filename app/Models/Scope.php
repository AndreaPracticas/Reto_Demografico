<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scope extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    // A scope has many files
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
