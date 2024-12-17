<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picture;
use Illuminate\Http\Request;
use Mockery\Exception;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return=Page::all();
        $menus=Menu::all();
        return view('admin.page.index' , ['data'=>$return , 'menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus=Menu::all();
        return view('admin.page.form' , ['menus'=>$menus]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required|numeric|min:0|max:1',
            'description'=>'required',
            'menu_id'=>'required'
        ]);
        try {
            $insert = new Page();
            $insert->title=$request->input('title');
            $insert->status=$request->input('status');
            $insert->description=$request->input('description');
            $insert->menu_id=$request->input('menu_id');
            $insert->save();
            $menus=Menu::all();
            return view('admin.page.form' , ['status'=>true,'message'=>'صفحه با موفقیت ایجاد شد' , 'menus'=>$menus]);
        } catch (Exception $exception){
            return view('admin.page.form' , ['status'=>false,'message'=>'خطا در ایجاد صفحه']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=Page::findorFail($id);
        $menus=Menu::all();
        return view('admin.page.form' , ['id'=>$id,'editing'=>$result] , ['menus'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //        $request->validate([
        //            'title'=>'required',
        //            'status'=>'required|numeric|min:0|max:1',
        //            'description'=>'required',
        //            'menu_id'=>'required'
        //        ]);
        try {
            $in=Page::findOrFail($id);
            $in->title=$request->input('title');
            $in->status=$request->input('status');
            $in->description=$request->input('description');
            $in->menu_id=$request->input('menu_id');
            $in->save();
            return view('admin.page.form',['status'=>true,'message'=>'صفحه با موفقیت ویرایش شد','pic'=>true]);
        } catch (Exception $exception){
            return view('admin.page.form',['status'=>false,'message'=>'خطا در ویرایش صفحه']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=picture::where('page_id',$id)->get();
        foreach ($result as $item){
            picture::destroy($item->id);
        }
        $result=Page::findorFail($id);
        Page::destroy($result->id);
        return $this->index();
    }

    public function showMenuContent($id)
    {
        $menu = Menu::findOrFail($id);

        // Exception for "صفحه اصلی" (Home) and "محصولات" (Products)
        if ($menu->title === 'صفحه اصلی') {
            return redirect()->route('test'); // Redirect to the home page
        }
        if ($menu->title === 'محصولات') {
            return redirect()->route('product.list'); // Redirect to the product page
        }

        // Default dynamic content for other menus
        $menus = Menu::all(); // Fetch all menus for navigation
        $pages = Page::where('menu_id', $id)->where('status', 1)->get(); // Fetch active pages
        $pictures = Picture::where('menu_id', $id)->get(); // Fetch pictures related to the menu

        return view('client.menu_content', compact('menu', 'menus', 'pages', 'pictures'));
    }


}
