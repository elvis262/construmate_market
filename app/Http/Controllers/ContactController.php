<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Http\Requests\ContactUsRequest;
use App\Events\ContactUsRequestEvent;

class ContactController extends Controller
{
    public function contactUs(ContactUsRequest $request){
        event(new ContactUsRequestEvent($request->validated()));
        return back()->with('success','Votre message a bien été envoyé');
    }
    public function contact(){  
        return view('contact.contact-us')->with('entreprise',Entreprise::get()->first());
    }
}
