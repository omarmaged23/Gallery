<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bannerDetails extends Model
{
    use HasFactory;
    protected $table='banner_details';
    protected $guarded=[];
    public function banner()
    {
        return $this->belongsTo(banner::class);
    }
}
