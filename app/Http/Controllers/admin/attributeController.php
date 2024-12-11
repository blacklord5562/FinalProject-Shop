<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Attribute;
use App\Models\admin\Category;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Mockery\Exception;

class attributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $return=Attribute::all();
        return view('admin.attribute.index' , ['data'=>$return , 'categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attribute.form',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        try {
            $in=new Attribute();
            $in->title=$request->input('title');
            $in->category_id=$request->input('category_id');
            $in->save();
            return view('admin.attribute.form',['status'=>true,'message'=>'صفت گروه کالا با موفقیت ایجاد شد' , 'categories'=>Category::all()]);
        } catch (Exception $exception){
            return view('admin.attribute.form',['status'=>false,'message'=>'خطا در ایحاد صفت گروه کالا' , 'categories'=>Category::all()]);
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
        $result=Attribute::FindOrFail($id);
        return view('admin.attribute.form',['id'=>$id,'editing'=>$result,'categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
           'category_id' => 'required|exists:categories,id',
        ]);
        try {
            $in=Attribute::findOrFail($id);
            $in->title=$request->input('title');
            $in->category_id=$request->input('category_id');
            $in->save();
            return view('admin.attribute.form',['status'=>true,'message'=>'صفت گروه کالا با موفقیت ویرایش شد','categories'=>Category::all()]);
        } catch (Exception $exception){
            return view('admin.attribute.form',['status'=>false,'message'=>'خطا در ویرایش صفت گروه کالا']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=Attribute::FindOrFail($id);
        try{
            Attribute::destroy($result->id);
            return $this->index();
        }catch (Exception $e){
            return $this->index();
        }
    }
}
