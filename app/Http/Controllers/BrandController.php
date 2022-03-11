<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\multipic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Parser\Multiple;
use Illuminate\Support\Facades\Auth;

// use Image;
// use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageServiceProvider\Image;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
    
        [
            'brand_name.required' => 'Please Insert Brand Name',
            
        ]);
    
        $brand_image = $request->file('brand_image');
        
        $name_gen =hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = "image/brand/";
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

        // $last_img = 'image/brand/'.$name_gen;
    
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->back()->with('success','Brand Inserted Successfully');
    
    }

    public function EditBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function UpdateBrand(Request $request,$id)
    {
        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');
        
        $name_gen =hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = "image/brand/";
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);
    
        unlink($old_image);
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->back()->with('success','Brand Updated Successfully');
    }

    public function DeleteBrand($id)
    {
        $image =Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Deleted');
    }


    public function Multipic()
    {
        $images = multipic::all(); 
        return view('admin.multipic.index',compact('images'));
    }

    public function StoreImg(Request $request)
    {
        $image = $request->file('image');
        
        foreach($image as $multi_image)
        {

        

        $name_gen =hexdec(uniqid());
        $img_ext = strtolower($multi_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = "image/brand/";
        $last_img = $up_location.$img_name;
        $multi_image->move($up_location,$img_name);

        // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

        // $last_img = 'image/brand/'.$name_gen;
    
        multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
    }
        return Redirect()->back()->with('success','Brand Inserted Successfully');

    }


    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success','User Logout');
    }


}


