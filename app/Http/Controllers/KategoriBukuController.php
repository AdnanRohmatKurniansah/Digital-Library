<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.buku.kategori.index', [
            'title' => 'Kategori Buku',
            'kategories' => KategoriBuku::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku.kategori.create', [
            'title' => 'Tambah Buku'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        KategoriBuku::create($data);

        return redirect('/dashboard/buku/kategori')->with('success', 'Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBuku $kategoriBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBuku $kategori)
    {
        return view('dashboard.buku.kategori.edit', [
            'title' => 'Edit Buku',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBuku $kategori)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        $kategori->update($data);

        return redirect('/dashboard/buku/kategori')->with('update', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBuku $kategori)
    {
        $kategori->delete();
        return redirect('/dashboard/buku/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
