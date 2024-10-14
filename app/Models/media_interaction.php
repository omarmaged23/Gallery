<?php

namespace App\Models;

use App\Models\Admin\media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media_interaction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function media()
    {
        return $this->belongsTo(media::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
