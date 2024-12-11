<?php

namespace App\Models\admin;

use App\Models\admin\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picgallery extends Model
{
    use HasFactory;
    public function gallery(){
        return $this->belongsTo(gallery::class);
    }
}
