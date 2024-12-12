<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Gallery;
use App\Models\admin\Picgallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class picgalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = picgallery::all();
        $galleries = gallery::all();
        return view('admin.gallery.picindex', ['data' => $result , 'galleries' => $galleries]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.picgal', [ 'galleries' => $galleries ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $in = new picgallery();
            $in->status = $request->input('status');
            $in->pic ='';
            $in->description = $request->input('description');
            $in->gallery_id = $request->input('gallery_id');
            $in->save();
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('gallery' , $in->id.'.'.$request->file('fl')->Extension());

                $in->save();
            }
            $galleries = gallery::all();
            return view('admin.gallery.picgal', ['status' => true, 'message' => 'عکس با موفقیت بارگذاری شد','galleries' => $galleries]);
        } catch (Exception $exception) {
            return view('admin.gallery.picgal', ['status' => false, 'message' => 'خطا در بارگذاری عکس']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = picgallery::findorFail($id);
        return Storage::download($result->pic);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editing = picgallery::findorFail($id);
        $galleries = gallery::all();
        return view('admin.gallery.picgal', ['editing' => $editing, 'galleries' => $galleries]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
//            'fl' => 'required',
            'gallery_id' => 'required|exists:galleries,id'
        ]);
        try {
            $in = picgallery::findorFail($id);
            $in->status = $request->input('status');
            if ($request->hasFile('fl')) {
                $in->pic = $request->file('fl')->storeAs('gallery' , $in->id.'.'.$request->file('fl')->Extension());
            }
            $in->description = $request->input('description');
            $in->gallery_id = $request->input('gallery_id');
            $in->save();
            $galleries = gallery::all();
            return view('admin.gallery.picgal', ['status' => true, 'message' => 'رکورد با موفقیت ویرایش شد' , 'galleries' => $galleries ]);
        } catch (Exception $e) {
            $galleries = gallery::all();
            return view('admin.gallery.picgal', ['status' => false, 'message' => 'خطا درویرایش اطلاعات' , 'galleries' => $galleries]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = picgallery::findorFail($id);
        picgallery::destroy($result->id);
        storage::delete($result->pic);
        return $this->index();
    }
}
