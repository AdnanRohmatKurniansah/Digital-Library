<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.buku.index', [
            'title' => 'Data buku',
            'bukus' => Buku::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.buku.create', [
            'title' => 'Tambah buku',
            'kategori_bukus' => KategoriBuku::orderBy('nama', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|min:3|max:255',
            'deskripsi' => 'required|max:255',
            'penulis'  => 'required|max:255',
            'penerbit'  => 'required|max:255',
            'sampul' => 'image|file|max:2048',
            'jumlah' => 'required',
            'id_kategories' => ['required', 'array'],
            'tahun_terbit' => 'required',
        ]);

        if($request->file('sampul')) {
            $data['sampul'] = $request->file('sampul')->store('sampul_buku');
        } 

        if ($buku = Buku::create($data)) {
            $buku->kategori_bukus()->sync($data['id_kategories']);
        }

        return redirect('/dashboard/buku')->with('success', 'Buku baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('dashboard.buku.edit', [
            'title' => 'Edit buku',
            'buku' => $buku,
            'kategori_bukus' => KategoriBuku::orderBy('nama', 'asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $data = $request->validate([
            'judul' => 'required|min:3|max:255',
            'deskripsi' => 'required|max:255',
            'penulis'  => 'required|max:255',
            'penerbit'  => 'required|max:255',
            'sampul' => 'image|file|max:2048',
            'jumlah' => 'required',
            'id_kategories' => ['required', 'array'],
            'tahun_terbit' => 'required',
        ]);

        if ($request->file('sampul')) {
            if ($buku->sampul) {
                Storage::delete($buku->sampul);
            }
            $data['sampul'] = $request->file('sampul')->store('sampul_buku');
        }

        $buku->update($data);
        $buku->kategori_bukus()->sync($data['id_kategories']);
        
        return redirect('/dashboard/buku')->with('update', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $kategoribukus = $buku->kategori_bukus;
    
        foreach ($kategoribukus as $kategori) {
            $kategori->bukus()->detach($buku->id);
        }

        if ($buku->sampul) {
            Storage::delete($buku->sampul);
        }
        
        $buku->delete();
        return redirect('/dashboard/buku')->with('success', 'Buku berhasil dihapus');
    }

    // public function search(Request $request) {
    //     $keyword = $request->input('keyword');
    //     $bukus = Buku::where('judul', 'LIKE', '%' . $keyword . '%')->paginate(20);

    //     return view('listBuku', [
    //         'bukus' => $bukus
    //     ]);
    // }
}
