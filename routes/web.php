<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => Inertia::render('Homepage'))
    ->name('homepage');

Route::get('/panduan-buku', fn() => Inertia::render('PanduanDanBuku'))
    ->name('panduan-buku');

Route::get('/tentang', fn() => Inertia::render('TentangKami'))
    ->name('tentang');

Route::get('/kontak', fn() => Inertia::render('Kontak'))
    ->name('kontak');

Route::get('/kebijakan', fn() => Inertia::render('Legal'))
    ->name('kebijakan');

Route::get('/sekolah', fn() => Inertia::render('Sekolah', ['jenjang' => request()->input(key: 'jenjang')]))
    ->name('sekolah');

Route::get('/informasi', fn() => Inertia::render('RegistrationInfo'))
    ->name('informasi');

Route::get('/profil-sekolah/{slug}', fn($slug) => Inertia::render('ProfilSekolah', ['sekolah_id' => $slug]))
    ->name('profil-sekolah');

Route::get('/post', fn() => Inertia::render('Post'))
    ->name('post');

Route::get('/post/detail/{id}', fn($id) => Inertia::render('PostDetail', ['id' => $id]))
    ->name('post-detail');
