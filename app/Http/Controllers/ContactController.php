<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $contact = DB::table('contacts')->first();
        return view('pages.contact', compact('contact'));
    }

    public function form(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('contact')->with('success', 'Pesan berhasil dikirimkan!');;
    }

    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AddContact()
    {
        return view('admin.contact.add');
    }

    public function Edit($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.edit', compact('contact'));
    }

    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|max:100',
                'phone' => 'required',
                'address' => 'required|max:255'
            ],
            [
                'email.required' => 'Please input the email.',
                'phone.required' => 'Please input the phone number.',
                'address.required' => 'Please input the address.',
                'email.max' => 'Email should less than 255 characters.',
            ]
        );

        Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);

        return Redirect('admin/contact')->with('success', 'Data successfully updated!');
    }

    public function StoreContact(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => 'required|max:100',
                'phone' => 'required',
                'address' => 'required|max:255'
            ],
            [
                'email.required' => 'Please input the email.',
                'phone.required' => 'Please input the phone number.',
                'address.required' => 'Please input the address.',
                'email.max' => 'Email should less than 255 characters.',
            ]
        );

        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        return Redirect('admin/contact')->with('success', 'Data successfully inserted!');
    }

    public function AdminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function Delete($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('admin.contact')->with('success', 'Data berhasil dihapus!');
    }

    public function DeleteMessage($id)
    {
        ContactForm::find($id)->delete();

        return redirect()->route('admin.message')->with('success', 'Data berhasil dihapus!');
    }
}
