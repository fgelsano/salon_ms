<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{

    public function submit(Request $request)
    {
        // Retrieve form data
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        // Send email using Mailtrap
        Mail::send([], [], function ($message) use ($name, $email, $subject, $messageBody) {
            $message->to('your-email@inbox.mailtrap.io')
                ->from('mabiachristian75@gmail.com')
                ->subject('New form submission: ' . $subject)
                ->setBody('Name: ' . $name . '<br>Email: ' . $email . '<br>Message: ' . $messageBody, 'text/html');
        });

        // Redirect back or show a success message
        return redirect()->route('frontend.home')->with('success', ' Thank you for reaching us!');
    }
}
