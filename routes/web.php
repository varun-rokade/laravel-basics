<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use app\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use App\Models\Contact;

// use App\Models\User;


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->get()->first();    
    $multipic = DB::table('multipics')->get();
    return view('home',compact('brands','about','multipic'));
});

Route::get('home', function () {
    echo "This is Home Page";
});

Route::get('about', function () {
    return view('about');
});

// Route::get('contact',function()
// {
//     return view('contact');
// });

// Route::get('about','AboutController@index');//Laravel version 7 method 

// Route::get('about',[AboutController::class,'index']); // Laravel version 8 method 

Route::get('/contact',[ContactController::class,'index']);

//Category Controller
Route::get('category/all',[CategoryController::class,'Allcat'])->name('all.category');
Route::post('category/add',[CategoryController::class,'AddCat'])->name('store.category');

Route::get('category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('category/update/{id}',[CategoryController::class,'Update']);
Route::get('softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('category/pdelete/{id}',[CategoryController::class,'Pdelete']);

///For Brand Routes

Route::get('brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::post('brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('brand/delete/{id}',[BrandController::class,'DeleteBrand']);


///For Multi Image
Route::get('/multi/image',[BrandController::class,'Multipic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class,'StoreImg'])->name('store.image');

// For Slider

Route::get('home/slider/',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('add/slider/',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('store/slider/',[HomeController::class,'StoreSlider'])->name('store.slider');


// For Home About

Route::get('home/about/',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('add/about/',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('store/about/',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('about/edit/{id}', [AboutController::class,'EditAbout']);
Route::post('update/about/{id}', [AboutController::class,'UpdateAbout']);
Route::get('about/delete/{id}', [AboutController::class,'DeleteAbout']);

// Portfolio
Route::get('portfolio/',[AboutController::class,'portfolio'])->name('portfolio');

// Contacts
Route::get('admin/contact/',[ContactController::class,'AdminContact'])->name('admin.contact');
Route::get('admin/add/contact/',[ContactController::class,'AddContact'])->name('add.contact');
Route::post('admin/store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
// Route::get('admin/contact/edit/{id}',[ContactController::class,'EditContact']);

Route::get('/contact/',[ContactController::class,'Contact'])->name('contact');
Route::post('contact/form',[ContactController::class,'ContactForm'])->name('contact.form');

Route::get('admin/contactform',[ContactController::class,'Showcontactform'])->name('admin.contactform');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    // $users = User::all();
    // $users = DB::table('users')->get();
    return view('admin/index');
})->name('dashboard');


Route::get('user/logout',[BrandController::class,'Logout'])->name('user.logout');

//Change Password

Route::get('/user/password',[ChangePass::class,'Cpassword'])->name('change.password');
Route::post('password/update',[ChangePass::class,'PassUpdate'])->name('password.update');

//User Profile

Route::get('user/profile',[ChangePass::class,'PUpdate'])->name('profile.update');
Route::post('user/profile/update',[ChangePass::class,'updateUser'])->name('profile.update.user');

