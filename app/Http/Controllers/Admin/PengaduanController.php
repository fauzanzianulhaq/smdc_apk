<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('Admin.Pengaduan.index');
    }

    public function show($id_pengaduan)
    {
        
    }
}
