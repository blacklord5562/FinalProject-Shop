<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Gallery;
use App\Models\admin\Menu;
use App\Models\admin\Picgallery;
use Illuminate\Foundation\Exceptions\Renderer\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function download($id){
        $gallery = Gallery::findorFail($id);
        return Storage::download($gallery->pic);
    }
    public function list(){
        $result=Gallery::all();
        $menus=Menu::all();
        return view('admin.gallery.index',['data'=>$result , 'menus'=>$menus]);
    }

    public function create(){
        $menus=Menu::all();
        return view('admin.gallery.form',['menus'=>$menus]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1',
            'menu_id' => 'required|exists:menus,id'
        ]);
        try {
            $in=new Gallery();
            $in->title=$request->input('title');
            $in->status=$request->input('status');
            $in->description=$request->input('description');
            $in->menu_id =$request->input('menu_id');
            $in->save();
            $menus=Menu::all();
            return view('admin.gallery.form',['status'=>true,'message'=>'گالری با موفقیت ایجاد شد','menus'=>$menus]);
        } catch (\Exception $e) {
            return view('admin.gallery.form',['status'=>false,'message'=>'خطا در ایجاد گالری']);
        }

    }
    public function edit($id){
        $menus=menu::all();
        $gallery=gallery::findOrFail($id);
        return view('admin.gallery.form' , ['editing'=>$gallery , 'menus'=>$menus]);
    }
    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1',
            'menu_id' => 'required|exists:menus,id',
            'pic'=>'required'
        ]);
        try {
            $gallery=gallery::findOrFail($id);
            $gallery->title=$request->input('title');
            $gallery->status=$request->input('status');
            $gallery->description=$request->input('description');
            $gallery->menu_id=$request->input('menu_id');
            $gallery->pic=$request->input('fl')->storeAs('gallery' , $gallery->id.'.'.$request->file('fl')->Extension());
            $gallery->save();
            return view('admin.gallery.form',['status'=>true,'message'=>'رکورد با موفقیت ویرایش شد']);
        }catch (\Exception $e) {
            return view('admin.gallery.form',['status'=>false,'message'=>'خطا درویرایش اطلاعات']);
        }

    }
    public function destroy($id){
        $result=picgallery::where('gallery_id',$id)->get();
        foreach ($result as $item){
            picgallery::destroy($item->id);
        }
        try{
            $result=gallery::findorFail($id);
            gallery::destroy($result->id);
            return $this->list();
        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
