<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Denda;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index() {
        return view('dashboard.peminjaman.index', [
            'title' => 'List peminjaman',
            'peminjamans' => Peminjaman::orderBy('id', "desc")->get()
        ]); 
    }

    public function pinjam() {
        return view('dashboard.peminjaman.create', [
            'title' => 'Buat peminjaman baru',
            'bukus' => Buku::orderBy('judul', "asc")->get(),
            'users' => User::where('role', '=', 'peminjam')->orderBy('nama_lengkap')->get()
        ]); 
    }

    public function pinjamStore(Request $request) {
        $data = $request->validate([
            'id_buku' => 'required',
            'id_user' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $jumlahDipinjam = Peminjaman::where('id_user', $data['id_user'])
            ->where('status', '!=', 'dikembalikan')
            ->count();

        if ($jumlahDipinjam >= 2) {
            return redirect('/dashboard/peminjaman')->with('error', 'Tolong kembalikan buku sebelumnya');
        }

        $buku = Buku::where('id', $data['id_buku'])->first();
        $buku->update([
            'jumlah' => $buku->jumlah - 1
        ]);

        Peminjaman::create($data);

        return redirect('/dashboard/peminjaman')->with('success', 'Peminjaman berhasil');
    }

    public function kembalikanBuku(Peminjaman $peminjaman) {
        $data =  [
            'status' => 'dikembalikan',
            'dikembalikan' => now()
        ];
    
        $peminjaman->update($data);
    
        if ($data['dikembalikan'] > $peminjaman->tgl_kembali) {
            $selisihHari = Carbon::parse($data['dikembalikan'])->diffInDays($peminjaman->tgl_kembali);
            $nominalDenda = 1000 * $selisihHari;
            Denda::create([
                'id_peminjaman' => $peminjaman->id,
                'nominal' => $nominalDenda
            ]);
            $buku = Buku::where('id', $peminjaman->id_buku)->first(); 
            $buku->update([
                'jumlah' => $buku->jumlah + 1
            ]);
        
            return redirect('/dashboard/denda')->with('info', 'Buku telah dikembalikan tolong bayar dendanya');
        } else {
            $buku = Buku::where('id', $peminjaman->id_buku)->first(); 
            $buku->update([
                'jumlah' => $buku->jumlah + 1
            ]);
        
            return back()->with('info', 'Buku telah dikembalikan');
        }
    
    }
}
