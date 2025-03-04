<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function about()
    {
        return nl2br("Nama: Fahri Zanuar Pradian \n NIM: 2341720104");
    }

}
