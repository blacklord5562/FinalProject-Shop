<?php
namespace App\Http\Controllers;

use App\Models\admin\Gallery;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picgallery;
use App\Models\admin\Picture;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index($mm){
        $idd=$mm;
        $menu = Menu::findorFail($idd);
        $menus = Menu::all();
        $pages = Page::where('menu_id',$mm)->get();
        $pictures =Picture::where('menu_id',$mm)->get();
        $galleries = Gallery::where('menu_id',$mm)->get();
        $picgalleries = Picgallery::all();
        if ($mm==1){
            return view('client.master' , ['menus'=>$menus,'pages'=>$pages,'pictures'=>$pictures]);
        }
        return view('client.client' , ['menus' => $menus, 'pages' => $pages, 'pictures' => $pictures , 'menu' => $menu , 'galleries' => $galleries , 'picgalleries' => $picgalleries ]);
    }
    public function login()
    {
        $menus = Menu::all();
        return view('client.login' ,['menus' => $menus]);
    }

    public function signup()
    {

    }
}

