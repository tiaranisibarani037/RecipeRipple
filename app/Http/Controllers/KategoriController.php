<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        // $kategori = Kategori::all();  // Get all categories
        return view('kategori.create');  // Pass $kategori to the view
    }

    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama = $request->nama;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index');
    }

    //show
    // public function show($id)
    // {
    //     $kategori = Kategori::find($id);
    //     return view('kategori.show', compact('kategori'));
    //     }
}
