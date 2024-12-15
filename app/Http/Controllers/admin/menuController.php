<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picture;
use Illuminate\Http\Request;
use Mockery\Exception;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return=Menu::all();
        return view('admin.menu.index' , ['data'=>$return]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'url' => 'required|string|unique:menus,url', // Validate URL field
        ]);

        try {
            $in = new Menu();
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            $in->url = $request->input('url'); // Save URL field
            $in->save();

            return view('admin.menu.form', ['status' => true, 'message' => 'منو با موفقیت ایجاد شد', 'editing' => false]);
        } catch (\Exception $exception) {
            return view('admin.menu.form', ['status' => false, 'message' => 'خطا در ایجاد منو']);
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
        $result=Menu::FindOrFail($id);
        return view('admin.menu.form',['id'=>$id,'editing'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'url' => 'required|string|unique:menus,url,' . $id, // Validate unique URL excluding current menu
        ]);

        try {
            $in = Menu::findOrFail($id);
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            $in->url = $request->input('url'); // Update URL field
            $in->save();

            return view('admin.menu.form', ['status' => true, 'message' => 'منو با موفقیت ویرایش شد', 'editing' => $in]);
        } catch (\Exception $exception) {
            return view('admin.menu.form', ['status' => false, 'message' => 'خطا در ویرایش منو']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=Picture::where('menu_id',$id)->get();
        foreach ($result as $item){
            Picture::destroy($item->id);
        }
        $result=Page::where('menu_id',$id)->get();
        foreach ($result as $item){
            Page::destroy($item->id);
        }
        $result=Menu::FindOrFail($id);
        try{
            Menu::destroy($result->id);
            return $this->index();
        }catch (Exception $e){
            return $this->index();
        }
    }
}
