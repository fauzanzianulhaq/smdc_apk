<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasyarakatController extends Controller
{
    public function index()
    {
        return view('Admin.Masyarakat.index');
    }

    public function show($nik)
    {
        return view('Admin.Masyarakat.show');
    }
}
