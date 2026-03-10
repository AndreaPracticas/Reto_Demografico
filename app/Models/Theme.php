<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory, SoftDeletes;

    // enable default timestamp columns (created_at, updated_at)

    protected $fillable = ['name', 'icon'];

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
