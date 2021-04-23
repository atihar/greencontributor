<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function send_message(Request $request)
    {
        $details = [
            'title' => 'Mail from '.$request->email,
            'body' => $request->text,
            'sender'=> $request->email,
        ];
        \Mail::to('admin@greencontributor.org')->send(new \App\Mail\ContactMessageMail($details));
   
        dd("Email is Sent.");
        // $messages = new ContactMessage();
        // $messages->first_name = $request->first_name;
        // $messages->last_name = $request->last_name;
        // $messages->contact_number = $request->contact_number;
        // $messages->email = $request->email;
        // $messages->text = $request->text;
        // $messages->save();
        // return redirect()->back();
    }
}
