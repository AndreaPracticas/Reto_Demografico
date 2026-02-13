<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'pdf_path',
        'theme_id',
        'subtheme_id',
        'scope_id',
        'user_id',
        'reopening_date',
        'closing_date',
    ];

    // Relationships

    // File belongs to a theme
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    // File belongs to a subtheme
    public function subtheme()
    {
        return $this->belongsTo(Subtheme::class);
    }

    // File belongs to a scope (renombrado para evitar conflicto con método scope de Eloquent)
    public function scopeRelation()
    {
        return $this->belongsTo(Scope::class, 'scope_id');
    }

    // File belongs to a user (author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Derived attribute: open / closed
    public function getStatusAttribute()
    {
        $today = now()->toDateString();

        return ($today >= $this->reopening_date && $today <= $this->closing_date)
            ? 'open'
            : 'closed';
    }
}
