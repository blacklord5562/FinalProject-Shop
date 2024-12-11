<?php

namespace App\Models\admin;

use App\Models\admin\Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function page(){
        return $this->belongsTo(page::class);
    }
}
