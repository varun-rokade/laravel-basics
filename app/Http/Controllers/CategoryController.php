<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Allcat()
    {

        // $categories = DB::table('categories')
        //     ->join('users','categories.user_id','users.id')
        //     ->select('categories.*','users.name')            
        //     ->paginate(5);

        $categories = Category::paginate(5);
        $trashcat = Category::onlyTrashed()->paginate(3);

        // $categories = Category::paginate(5);
        // $categories = DB::table('categories')->paginate(5);
        return view('admin.category.index',compact('categories','trashcat'));
    }
    public function AddCat(Request $request)
    {

        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
    
        [
            'category_name.required' => 'Please Insert Category Name',
        ]);    
    
        // Category::insert([
        //         'category_name' => $request->category_name,
        //         'user_id' => Auth::user()->id,
        //         'created_at' => Carbon::now(),
        // ]);

        // $category = new Category();
        // $category ->category_name = $request->category_name;
        // $category ->user_id = Auth::user()->id;
        // $category ->save();
            
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);    


        return Redirect()->back()->with('success','Category Inserted');


    }

    public function Edit($id)
    {
        // $categories = Category::find($id); 
        $categories = DB::table('categories')->where('id',$id)->first() ;
        return view('admin.category.edit',compact('categories'));

    }

    public function Update(Request $request,$id)
    {
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
            $data = array();
            $data['category_name'] = $request->category_name;
            $data['user_id'] = Auth::user()->id;
            DB::table('categories')->where('id',$id)->update($data);


        return Redirect()->route('all.category')->with('success','Category Updated Successfully');

    }

    public function SoftDelete($id)
    {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfull');
    }

    public function restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore(); 
        return Redirect()->back()->with('success','category restored successfully ');   
    }

    public function Pdelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Deleted From Trash');


    }

}
