<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function message(Request $r){
        Messages::create([
            'name'=>$r->name,
            'email'=>$r->email,
            'subject'=>$r->subject,
            'message'=>$r->message
        ]);
        return redirect()->back()->with('msg','You message has been sent.');
    }
}
