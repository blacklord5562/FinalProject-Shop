<?php

use Illuminate\Support\Facades\Route;
/*
 * client
 */
Route::middleware('auth')->prefix('/client')->group(function () {
    Route::get('/', function () {
        return view('client.home');
    })->name('home');
    Route::get('/home', function () {
        return view('client.home');
    });
});

// Add the route for editing the user profile
Route::middleware('auth')->get('/profile', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
Route::middleware('auth')->post('/profile', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');



/*
 * Admin Routes
 */
Route::middleware('auth')->get('/admin', function () {
    return view('admin.master');
});

/*
 * Admin Profile Route
 * This will handle showing the user's profile information in the admin area
 */
Route::middleware('auth')->get('/admin/profile', function () {
    $user = auth()->user();  // Get the logged-in user data
    return view('admin.profile', compact('user'));  // Return the profile view and pass the user data
})->name('admin.profile');

/*
 * Gallery Routes
 */
Route::get('/admin/create/gallery', [\App\Http\Controllers\admin\galleryController::class, 'create'])->name('admin.create.gallery');
Route::post('/admin/store/gallery', [\App\Http\Controllers\admin\galleryController::class, 'store'])->name('admin.store.gallery');
Route::get('/admin/list/gallery', [\App\Http\Controllers\admin\galleryController::class, 'list'])->name('admin.list.gallery');
Route::get('/admin/edit/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'edit'])->name('admin.edit.gallery');
Route::post('/admin/update/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'update'])->name('admin.update.gallery');
Route::delete('/admin/delete/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'destroy'])->name('admin.delete.gallery');
Route::get('admin/show/gallery/{id}', [\App\Http\Controllers\admin\galleryController::class, 'download'])->name('gallery.show');

/*
 * Picture Routes
 */
Route::resource('/admin/picture', \App\Http\Controllers\admin\pictureController::class)->except(['update']);
Route::post('/admin/update/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'update'])->name('picture.update');
Route::get('/admin/show/picture/{id}', [\App\Http\Controllers\admin\pictureController::class, 'download'])->name('picture.show');

/*
 * Menu Routes
 */
Route::resource('/admin/menu', \App\Http\Controllers\admin\menuController::class)->except(['update']);
Route::post('/admin/update/menu/{id}', [\App\Http\Controllers\admin\menuController::class, 'update'])->name('menu.update');

/*
 * Picture Gallery Routes
 */
Route::get('admin/picture/gallery/list',[\App\Http\Controllers\admin\picgalleryController::class, 'index'])->name('picturegal.index');
Route::get('admin/picture/gallery/show/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'show'])->name('picturegal.show');
Route::post('admin/picture/gallery/store',[\App\Http\Controllers\admin\picgalleryController::class, 'store'])->name('picturegal.store');
Route::get('admin/picture/gallery/edit/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'edit'])->name('picturegal.edit');
Route::post('admin/picture/gallery/update/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'update'])->name('picturegal.update');
Route::get('admin/picture/gallery/create',[\App\Http\Controllers\admin\picgalleryController::class, 'create'])->name('picturegal.create');
Route::delete('admin/picture/gallery/destroy/{id}',[\App\Http\Controllers\admin\picgalleryController::class, 'destroy'])->name('picturegal.destroy');

/*
 * Page Routes
 */
Route::resource('/admin/page', \App\Http\Controllers\admin\pageController::class)->except(['update']);
Route::post('/admin/update/page/{id}', [\App\Http\Controllers\admin\pageController::class, 'update'])->name('page.update');

/*
 * Category Routes
 */
Route::resource('/admin/category', \App\Http\Controllers\admin\categoryController::class)->except(['update']);
Route::post('/admin/update/category/{id}', [\App\Http\Controllers\admin\categoryController::class, 'update'])->name('category.update');

/*
 * Attribute Routes
 */
Route::resource('/admin/attribute', \App\Http\Controllers\admin\attributeController::class)->except(['update']);
Route::post('/admin/update/attribute/{id}', [\App\Http\Controllers\admin\attributeController::class, 'update'])->name('attribute.update');

/*
 * Product Routes
 */
Route::get('/admin/index/product', [\App\Http\Controllers\admin\productController::class, 'index'])->name('product.index');
Route::post('/admin/update/product/{id}', [\App\Http\Controllers\admin\productController::class, 'update'])->name('product.update');
Route::get('admin/show/product/{id}', [\App\Http\Controllers\admin\productController::class, 'show'])->name('product.show');
Route::get('admin/creating/product', [\App\Http\Controllers\admin\productController::class, 'creating'])->name('product.creating');
Route::get('/admin/create/product', [\App\Http\Controllers\admin\productController::class, 'create'])->name('product.create');
Route::post('/admin/store/product', [\App\Http\Controllers\admin\productController::class, 'store'])->name('product.store');
Route::get('admin/edit/product/{id}', [\App\Http\Controllers\admin\productController::class, 'edit'])->name('product.edit');
Route::delete('/admin/delete/product/{id}', [\App\Http\Controllers\admin\productController::class, 'destroy'])->name('product.destroy');
Route::get('/',function (){
    $menu=\App\Models\admin\Menu::all();
    return view('client.test' , ['menu'=>$menu]);
})->name('test');
/*
 * client
 */
$menus=\App\Models\admin\Menu::all();
$pages=\App\Models\admin\Page::all();
$pictures=\App\Models\admin\Picture::all();

Auth::routes();

