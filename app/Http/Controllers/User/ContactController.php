<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function email(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $admin = Admin::first()->email;
        Mail::to($admin)->send(new contactMail($request->name,$request->email,$request->subject,$request->message));

        return back()->with('success','email sent successfully');

    }
}
