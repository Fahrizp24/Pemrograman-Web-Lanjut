<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return nl2br("Nama: Fahri Zanuar Pradian \n NIM: 2341720104");
    }

    public function articles($id)
    {
        return 'Halaman Artikel dengan ID ' . $id;
    }
}