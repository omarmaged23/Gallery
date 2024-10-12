<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function mediaDetails()
    {
        return $this->hasOne(media_details::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'uploaded_by_id');
    }
    public function slugs()
    {
        return $this->belongsToMany(slugs::class, 'media_slugs', 'media_id', 'slug_id');
    }
    public function categories()
    {
        return $this->belongsToMany(category::class, 'media_categories', 'media_id', 'category_id');
    }
}
