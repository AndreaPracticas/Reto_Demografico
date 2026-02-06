<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subtheme extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'theme_id',
    ];

    // Subtheme belongs to a theme
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    // Subtheme has many files
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
