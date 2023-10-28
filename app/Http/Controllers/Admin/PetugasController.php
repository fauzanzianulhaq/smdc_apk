<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetugasController extends Controller
{
    public function index()
    {
        return view('Admin.Petugas.index');
    }

    public function create()
    {
        return view('Admin.Petugas.index');
    }

    public function store(Request $request)
    {

    }

    public function edit($id_petugas)
    {
        return view('Admin.Petugas.edit');
    }

    public function update(Request $request, $id_petugas)
    {
        
    }

    public function destroy($id_petugas)
    {
        
    }
}
