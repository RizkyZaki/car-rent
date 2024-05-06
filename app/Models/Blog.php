<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blog';
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
