<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picture;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Mockery\Exception;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return=Category::all();
        return view('admin.category.index' , ['data'=>$return]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1'
        ]);
        try {
            $in=new Category();
            $in->title=$request->input('title');
            $in->status=$request->input('status');
            $in->save();
            return view('admin.category.form',['status'=>true,'message'=>'گروه کالا با موفقیت ایجاد شد']);
        } catch (Exception $exception){
            return view('admin.category.form',['status'=>false,'message'=>'خطا در ایحاد گروه کالا']);
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
        $result=Category::FindOrFail($id);
        return view('admin.category.form',['id'=>$id,'editing'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1'
        ]);
        try {
            $in=Category::findOrFail($id);
            $in->title=$request->input('title');
            $in->status=$request->input('status');
            $in->save();
            return view('admin.category.form',['status'=>true,'message'=>'گروه کالا با موفقیت ویرایش شد']);
        } catch (Exception $exception){
            return view('admin.category.form',['status'=>false,'message'=>'خطا در ویرایش گروه کالا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=Product::where('category_id',$id)->get();
        foreach ($result as $item){
            Product::destroy($item->id);
        }
        $result=Category::FindOrFail($id);
        try{
            Category::destroy($result->id);
            return $this->index();
        }catch (Exception $e){
            return $this->index();
        }
    }
}
