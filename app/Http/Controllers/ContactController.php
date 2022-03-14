<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact()
    {
        $contact = Contact::all();    
        return view('admin.contact.index',compact('contact'));
    }

    public function AddContact()
    {
        return view('admin.contact.create');

    }

    public function StoreContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('admin.contact')->with('success','Contact inserted successfully');
    }

    // public function EditContact($id)
    // {
    //     $editcontact = Contact::find($id);
    //     return view('admin.contact.edit',compact('editcontact'));
    // }

    public function Contact()
    {
        $contact = DB::table('contacts')->first();
        return view('pages.contact',compact('contact'));
    }

    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message'=>$request->message,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('contact')->with('success','Message Sent successfully');

    }
    public function Showcontactform()
    {
        $conform = ContactForm::all();
        return view('admin.contact.message',compact('conform'));
    }
}
