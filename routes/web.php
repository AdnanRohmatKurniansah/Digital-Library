<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanController;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Home'
    ]);
});

Route::get('/buku', function() {
    return view('listBuku', [
        'title' => 'List buku',
        'bukus' => Buku::orderBy('id', 'desc')->filter(request(['search']))->paginate(20)
    ]);
});

Route::get('/buku/{buku}', function(Buku $buku) {
    return view('detailBuku', [
        'title' => 'Detail buku',
        'buku' => $buku,
        'ulasans' => Ulasan::where('id_buku', $buku->id)->get()
    ]);
});

Route::post('/ulasan', [UlasanController::class, 'beriUlasan']);
Route::middleware('auth')->group(function() {
    Route::get('/koleksi', [KoleksiController::class, 'koleksi']);
    Route::delete('/koleksi/{koleksi}', [KoleksiController::class, 'hapusKoleksi']);
});
Route::post('/koleksi', [KoleksiController::class, 'tambahKoleksi']);

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', function() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'peminjamans' => Peminjaman::select(DB::raw('DATE_FORMAT(updated_at, "%M") AS date'), DB::raw('COUNT(*) AS count'))
            ->groupBy(DB::raw('DATE_FORMAT(updated_at, "%M")'))
            ->orderBy(DB::raw('DATE_FORMAT(updated_at, "%M")'))
            ->get()
        ]);
    });
    Route::middleware('admin')->group(function() {
        Route::get('/user', [AuthController::class, 'listUser']);
        Route::get('/user/create', [AuthController::class, 'addUser']);
        Route::post('/user', [AuthController::class, 'addUserStore']);
        Route::delete('/user/{user}', [AuthController::class, 'deleteUser']);
    });
    Route::resource('/buku/kategori', KategoriBukuController::class);
    Route::resource('/buku', BukuController::class);
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/peminjaman/pinjam', [PeminjamanController::class, 'pinjam']);
    Route::post('/peminjaman', [PeminjamanController::class, 'pinjamStore']);
    Route::put('/peminjaman/{peminjaman}', [PeminjamanController::class, 'kembalikanBuku']);
    Route::get('/denda', [DendaController::class, 'index']);
    Route::put('/denda/{denda}', [DendaController::class, 'bayar']);
});

Route::middleware(['guest'])->prefix('auth')->group(function() {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'auth']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');


