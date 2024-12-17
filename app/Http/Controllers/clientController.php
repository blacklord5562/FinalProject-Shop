<?php
namespace App\Http\Controllers;

use App\Models\admin\Gallery;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picgallery;
use App\Models\admin\Picture;
use Illuminate\Http\Request;
use App\Models\admin\Product;

class clientController extends Controller
{
    public function index($mm = null)
    {
        $menu = Menu::all(); // All menus
        $pages = Page::all();
        $pictures = Picture::all();
        $galleries = Gallery::all();
        $picgalleries = Picgallery::all();

        // Fetch 8 random products
        $products = Product::inRandomOrder()->take(8)->get();

        // If $mm is 1, return master view
        if ($mm == 1) {
            return view('client.master', [
                'menus' => $menu,
                'pages' => $pages,
                'pictures' => $pictures,
                'products' => $products,
            ]);
        }

        // Otherwise return the regular client view
        return view('client.client', [
            'menus' => $menu,
            'pages' => $pages,
            'pictures' => $pictures,
            'galleries' => $galleries,
            'picgalleries' => $picgalleries,
            'products' => $products,
        ]);
    }

    public function login()
    {
        $menus = Menu::all();
        return view('client.login', ['menus' => $menus]);
    }

    public function signup()
    {
        // Additional logic for signup (if needed)
    }
}

