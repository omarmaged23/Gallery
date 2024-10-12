<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function bannerDetails()
    {
        return $this->hasOne(bannerDetails::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'uploaded_by_admin');
    }
}
