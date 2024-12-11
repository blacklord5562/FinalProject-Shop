<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Attribute;
use App\Models\admin\Category;
use App\Models\admin\Menu;
use App\Models\admin\Page;
use App\Models\admin\Picture;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
use function Laravel\Prompts\select;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create(request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);
            $data = Attribute::where('category_id',$request->input('category_id'))->get();
            $category=$request->input('category_id');
            return view('admin.product.secondform', [ 'attributes' => $data , 'cat'=>$category ]);
    }
    public function creating(){

        return view('admin.product.form' , ['categories' => Category::all() ]);
    }

    public function store(Request $request){
        $request->validate([
//            'title' => 'required',
//            'status' => 'required|in:0,1',
//            'description' => 'required',
//            'fl' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'price' => 'required|numeric',
//            'discount' => 'required|numeric',
        ]);
        try {
            $cat=$request->input('cat');
            $in =new Product();
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            $in->description = $request->input('description');
            $in->category_id = $cat;
            $in->price= $request->input('price');
            $in->discount= $request->input('discount');
            $in->save();
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('product' , $in->id.'.'.$request->file('fl')->Extension());
                $in->save();
            }
            $prd=Product::findorFail($in->id);
            $att = Attribute::where('category_id',$cat)->get();
            foreach ($att as $a) {
                $vl=$request->input($a->title);
                $prd->attributes()->attach($a->id,['value'=>$vl]);
            }
            return view('admin.product.secondform', ['status' => true, 'message' => 'کالا با موفقیت ایجاد شد' , 'cat'=>true]);}
        catch (Exception $exception){
            return view('admin.product.secondform', ['status' => false, 'message' => 'خطا در بارگذاری عکس' , 'cat'=>false]);}
    }

    public function index()
    {
        $data = Product::all();
        $attribute = Attribute::all();
        $cat = Category::all();
//        $a_p=$data->attributes()->where('product_id',$data->id)->get(['value' , 'attribute_id']);
        return view('admin.product.index', ['data' => $data , 'attributes' => $attribute , 'cat'=>$cat ]);
    }


    public function show($id){
        $result = Product::findorFail($id);
        return Storage::download($result->pic);
    }


    public function update($id,request $request)
    {
        $request->validate([
//            'title' => 'required',
//            'status' => 'required|in:0,1',
//            'description' => 'required',
//            'fl' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'price' => 'required|numeric',
//            'discount' => 'required|numeric',
        ]);
        try {
            $in = Product::findorFail($id);
            $in->title = $request->input('title');
            $in->status = $request->input('status');
            $in->description = $request->input('description');
            $in->price= $request->input('price');
            $in->save();
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('product' , $in->id.'.'.$request->file('fl')->Extension());
                $in->save();
            }
            $att = Attribute::where('category_id',$in->category_id)->get();
            $in->attributes()->detach();
            foreach ($att as $a) {
                $vl=$request->input($a->title);
                $in->attributes()->attach($a->id,['value'=>$vl]);
            }
            return view('admin.product.secondform', ['status' => true, 'message' => 'رکورد با موفقیت ویرایش شد','cat'=>true]);
        } catch (Exception $e) {
            return view('admin.product.secondform', ['status' => false, 'message' => 'خطا درویرایش اطلاعات','cat'=>false]);
        }
    }

    public function edit($id)
    {

        $product=Product::findorFail($id);
        $attribute=Attribute::where('category_id',$product->category_id)->get();
        $a_p=$product->attributes()->where('product_id',$product->id)->get(['value' , 'attribute_id']);
        return view('admin.product.secondform', ['editing' => $product , 'a_p'=>$a_p, 'attributes' => $attribute , 'cat'=>$product->category_id ]);



    }

    public function destroy($id)
    {
        $prd=Product::findorFail($id);
        $prd->attributes()->detach();
        Product::destroy($prd->id);
        storage::delete($prd->pic);
        return $this->index();
    }
}
