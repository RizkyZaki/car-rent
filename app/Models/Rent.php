<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rent';
    protected $guarded = ['id'];
    public function post()
    {
        return $this->belongsTo(PostCar::class, 'id_post_car');
    }
}
