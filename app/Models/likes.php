<?php

namespace App\Models;

use App\Models\Admin\media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function media()
    {
        return $this->belongsTo(media::class);
    }
}
