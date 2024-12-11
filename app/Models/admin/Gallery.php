<?php

namespace App\Models\admin;

use App\Models\admin\Menu;
use App\Models\admin\Picgallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public function menu(){
        return $this->belongsTo(\App\Models\admin\Menu::class);
    }
    public function images(){
        return $this->hasMany(\App\Models\admin\Picgallery::class);
    }
}
