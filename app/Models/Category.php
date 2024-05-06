<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'category';
    protected $guarded = ['id'];
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'id_category');
    }
    public function posts()
    {
        return $this->hasMany(PostCar::class, 'id_category');
    }
}
