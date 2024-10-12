<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function media()
    {
        return $this->belongsToMany(media::class, 'media_categories', 'category_id', 'media_id');
    }
}
