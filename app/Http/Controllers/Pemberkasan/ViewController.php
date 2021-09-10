<?php

namespace App\Http\Controllers\Pemberkasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view() {
        return view('tahap-berkas');
    }
}
// tahap-berkas.blade.php