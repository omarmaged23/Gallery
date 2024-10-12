<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media_details extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
