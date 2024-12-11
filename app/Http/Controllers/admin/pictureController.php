<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class pictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = picture::all();
        $menus = Menu::all();
        $pages = Page::all();
        return view('admin.picture.index', ['data' => $result , 'menus' => $menus , 'pages' => $pages]);
    }

    public function create()
    {
        $menus = Menu::all();
        $pages = Page::all();
        return view('admin.picture.form', ['menus' => $menus , 'pages' => $pages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'fl' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'page_id'=>'required|exists:pages,id',
            'menu_id' => 'required|exists:menus,id'
        ]);
        try {
            $in = new picture();
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            $in->pic ='';
            $in->description = $request->input('description');
            $in->menu_id = $request->input('menu_id');
            $in->page_id = $request->input('page_id');
            $in->save();
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('picture' , $in->id.'.'.$request->file('fl')->Extension());
                $in->save();
            }
            return view('admin.picture.form', ['status' => true, 'message' => 'عکس با موفقیت بارگذاری شد']);
        } catch (Exception $exception) {
            return view('admin.picture.form', ['status' => false, 'message' => 'خطا در بارگذاری عکس']);
        }

    }
    public function download($id){
        $result = picture::findorFail($id);
        return Storage::download($result->pic);
    }
    public function update($id,request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            'page_id'=>'required|exists:pages,id',
            'menu_id' => 'required|exists:menus,id'
        ]);
        try {
            $in = picture::findorFail($id);
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('picture' , $in->id.'.'.$request->file('fl')->Extension());
            }
            $in->description = $request->input('description');
            $in->menu_id = $request->input('menu_id');
            $in->page_id = $request->input('page_id');
            $in->save();
            return view('admin.picture.form', ['status' => true, 'message' => 'رکورد با موفقیت ویرایش شد']);
        } catch (Exception $e) {
            return view('admin.picture.form', ['status' => false, 'message' => 'خطا درویرایش اطلاعات']);
        }
    }

    public function edit(Request $request, $id)
    {
        $menus = Menu::all();
        $editing = picture::findorFail($id);
        $pages = Page::all();
        return view('admin.picture.form', ['editing' => $editing, 'menus' => $menus , 'pages'=>$pages]);



    }

    public function destroy($id)
    {
        $result = picture::findorFail($id);
        picture::destroy($result->id);
        storage::delete($result->pic);
        return $this->index();
    }
}
