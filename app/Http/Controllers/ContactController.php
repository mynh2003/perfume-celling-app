<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CartHelper;
use App\Models\Contact;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'addresses' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Contact::create([
            'full_name' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'addresses' => $request->addresses,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Thông tin liên hệ đã được gửi thành công.');
    }
    
}
