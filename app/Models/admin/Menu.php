<?php

namespace App\Models\admin;

use App\Models\admin\Page;
use App\Models\admin\Picture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public function pages(){
        return $this->hasMany(Page::class);
    }
    public function pictures(){
        return $this->hasMany(picture::class);
    }
}
