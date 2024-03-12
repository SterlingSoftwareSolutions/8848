<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $validated = $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "phone" => 'required',
            "company" => 'nullable',
            "message" => 'required',
        ]);

        $admin = User::where('role', 'admin')->first();

        Mail::send([], [], function(Message $message) use($admin, $validated) {
            $message->to($admin->email)
                ->subject(env('APP_NAME') . ' - Message From ' . $validated['name'])
                ->html(
                    'Name: ' . $validated['name'] . '<br>'.
                    'Email: ' . $validated['email'] . '<br>'.
                    'Phone: ' . $validated['phone'] . '<br>'.
                    'Company: ' . $validated['company'] . '<br>'.
                    '<br>'.
                    $validated['message']
                );
        });

        return back()->withErrors(['success', 'Your message was sent.']);
    }
}
