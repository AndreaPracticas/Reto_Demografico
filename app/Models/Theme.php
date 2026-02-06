<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    // A theme has many subthemes
    public function subthemes()
    {
        return $this->hasMany(Subtheme::class);
    }

    // A theme has many files
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
