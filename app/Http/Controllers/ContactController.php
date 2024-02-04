<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;

class ContactController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts=Contact::paginate(3);

        return view('contactboard', compact('contacts'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactform');
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required|max:500'
    ]);
    $contact = new Contact;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->message = $request->message;
    $contact->save();

    return redirect()->route('home')->with('success',
     'Le message a été bien enregistré !');
    //return "C'est bien enregistré !";
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back()->with('success', 'Le message a été supprimé');
        
    }

}