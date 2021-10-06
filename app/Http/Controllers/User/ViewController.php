<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pekerjaan;

class ViewController extends Controller
{
    public function index() {
        $pekerjaan = Pekerjaan::where("user_id", Auth::guard('users')->user()->id)->get();
        
        return view('user.dashboard', compact(['pekerjaan']));
    }
}
