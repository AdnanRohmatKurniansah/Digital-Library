<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    public function index() {
        return view('dashboard.denda.index', [
            'title' => 'List denda',
            'dendas' => Denda::orderBy('id', 'desc')->get()
        ]);
    }

    public function bayar(Request $request, Denda $denda) {
        $data = $request->validate([
            'dibayar' => 'required'
        ]);
    
        if ($data['dibayar'] == $denda->nominal) {
            $denda->update([
                'dibayar' => $data['dibayar'],
                'status' => 'lunas'
            ]);
        } else {
            $denda->update([
                'dibayar' => $data['dibayar'],
                'status' => 'blm-lunas'
            ]);
        }
    
        return back()->with('success', 'Denda berhasil dibayar');
    }
    
}
