<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;


/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('/client')->group(function () {
    Route::get('/', function () {
        // Ensure only clients can access
        if (Auth::user()->role !== 'client') {
            return redirect()->route('login'); // Redirect to login if not a client
        }
        return view('client.home');
    })->name('home');

    Route::get('/home', function () {
        if (Auth::user()->role !== 'client') {
            return redirect()->route('login');
        }
        return view('client.home');
    });

    Route::get('/profile', [\App\Http\Controllers\UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [\App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/admin')->group(function () {
    // Admin login route (without authentication)
    Route::get('/login', function () {
        return view('auth.admin-login');
    })->name('admin.login');

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            // Ensure only admins can access
            if (Auth::user()->role !== 'admin') {
                return redirect()->route('admin.login'); // Redirect to admin login if not an admin
            }
            return view('admin.master');
        })->name('admin.dashboard');

        Route::get('/profile', function () {
            if (Auth::user()->role !== 'admin') {
                return redirect()->route('admin.login');
            }
            $user = Auth::user(); // Get the logged-in admin data
            return view('admin.profile', compact('user')); // Return the profile view
        })->name('admin.profile');
    });
});
Route::get('/admin/login', function () {
    if (Auth::check() && Auth::user()->role === 'client') {
        return redirect()->route('home'); // Redirect clients to their home page
    }

    return view('auth.admin-login');
})->name('admin.login');



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
    $menu = \App\Models\admin\Menu::where('status', 1)->get();
    $attribute=\App\Models\admin\Attribute::all();
    $category=\App\Models\admin\Category::all();
    $page=\App\Models\admin\Page::all();
    $picture=\App\Models\admin\Picture::all();
    $gallery=\App\Models\admin\Gallery::all();
    $picgallery=\App\Models\admin\Picgallery::all();
    $product=\App\Models\admin\Product::all();
    return view('client.test' , ['menu'=>$menu,'attribute'=>$attribute,'category'=>$category,'page'=>$page,'picture'=>$picture,'gallery'=>$gallery,'picgallery'=>$picgallery,'product'=>$product]);
})->name('test');

Route::get('/product/{id}', [\App\Http\Controllers\admin\productController::class, 'show'])->name('product.show');

/*
 * client
 */
$menus=\App\Models\admin\Menu::all();
$pages=\App\Models\admin\Page::all();
$pictures=\App\Models\admin\Picture::all();

Auth::routes();

