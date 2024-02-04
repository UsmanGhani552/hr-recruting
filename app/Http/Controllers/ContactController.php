<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
        $request->validate([
            'name',
            'email',
            'message'
        ]);

        // Render the email content using a Blade view
        $emailContent = View::make('mail.contact_mail', compact('request'))->render();
        $admin_email = Auth::user()->email;
        Mail::send([], [], function ($message) use ($admin_email,$emailContent) {
            $message->to($admin_email);
            $message->subject('Contact Us Email');
            $message->setBody($emailContent, 'text/html');
        });

        return back()->with('success','Thank you for contacting us, We will respond you shortly.');
    }
}
