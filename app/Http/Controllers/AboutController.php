<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\multipic;
use Carbon\Carbon;
use Psy\CodeCleaner\FunctionContextPass;


class AboutController extends Controller
{
    
    public function HomeAbout()
    {
        $homeabout = HomeAbout::get();
        return view('admin.homeabout.index',compact('homeabout'));
    }

    public function AddAbout()
    {
        return view('admin.homeabout.create');

    }

    public Function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->abouttitle,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            // 'created_at' => Carbon::now()
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('home.about')->with('success','About Home Added');
    }


    public function EditAbout($id)
    {
        $homeabout = HomeAbout::find($id);
        return view('admin.homeabout.edit',compact('homeabout'));
    }

    public function UpdateAbout(Request $request,$id)
    {
        $update = HomeAbout::find($id)->update([
            'title' => $request->abouttitle,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('home.about')->with('success','About Home Updated');

    }


    public function DeleteAbout($id)
    {

        $delete = HomeAbout::find($id)->Delete();
        return redirect()->back()->with('success','Deleted Successfully');

    }


    public function portfolio()
    {
        $images = multipic::get();
        return view('pages.portfolio',compact('images'));
    }



}
