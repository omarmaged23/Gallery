<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slugs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function media()
    {
        return $this->belongsToMany(Media::class, 'media_slugs', 'slug_id', 'media_id');
    }
}
