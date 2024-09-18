<?php

// routes/api.php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\FasilitasSekolahController;
use App\Http\Controllers\JenjangSekolahController;
use App\Http\Controllers\JmlKapitaSekolahController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\JenisInformasiController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DokumentasiSekolahController;

// route ini yang bisa diakses publik
Route::get('/fasilitas-sekolah', [FasilitasSekolahController::class, 'index'])
    ->name('sekolah.getFasilitas');

Route::get('/fasilitas-sekolah/{id}', [FasilitasSekolahController::class, 'show'])
    ->name('sekolah.getFasilitasByID');

Route::get('/jenjang-sekolah', [JenjangSekolahController::class, 'index'])
    ->name('sekolah.getJenjang');

Route::get('/jenjang-sekolah/{name}', [JenjangSekolahController::class, 'showByName'])
    ->name('sekolah.getJenjangByName');

Route::get('/jml-kapita-sekolah', [JmlKapitaSekolahController::class, 'index'])
    ->name('sekolah.getJmlKapita');

Route::get('/jml-kapita-sekolah/{id}', [JmlKapitaSekolahController::class, 'show'])
    ->name('sekolah.getJmlKapitaByID');

Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('sekolah.getProfilSekolah');

Route::get('/profil-sekolah/{slug}', [ProfilSekolahController::class, 'show'])
    ->name('sekolah.getProfilSekolahByID');

Route::get('/jenis-informasi', [JenisInformasiController::class, 'index'])
    ->name('informasi.getJenisInformasi');

Route::get('/jenis-informasi/{id}', [JenisInformasiController::class, 'show'])
    ->name('informasi.getJenisInformasiByID');

Route::get('/informasi', [InformasiController::class, 'index'])
    ->name('informasi.getInformasi');

Route::get('/informasi/{id}', [InformasiController::class, 'show'])
    ->name('informasi.getInformasiByID');

Route::get('/testimoni', [TestimoniController::class, 'index'])
    ->name('testimoni.getTestimoni');

Route::get('/testimoni/{id}', [TestimoniController::class, 'show'])
    ->name('testimoni.getTestimoniByID');

Route::get('jenis-dokumen', [JenisDokumenController::class, 'index'])
    ->name('dokumen.getJenisDokumen');

Route::get('jenis-dokumen/{id}', [JenisDokumenController::class, 'show'])
    ->name('dokumen.getJenisDokumenByID');

Route::get('dokumen', [DokumenController::class, 'index'])
    ->name('dokumen.getDokumen');

Route::get('dokumen/{id}', [DokumenController::class, 'show'])
    ->name('dokumen.getDokumenByID');

Route::get('search', [SearchController::class, 'search'])
    ->name('search.searchByPage');

Route::get('dokumentasi-sekolah', [DokumentasiSekolahController::class, 'index'])
    ->name('dokumentasi.getDokumentasi');

Route::get('dokumentasi-sekolah/{id}', [DokumentasiSekolahController::class, 'show'])
    ->name('dokumentasi.getDokumentasiByID');

Route::middleware('web')->group(function () {
    Route::post('/auth/login', [AdminAuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/Wnl3Y20U8lltBiX', [AdminAuthController::class, 'register'])
        ->name('auth.register');

    Route::post('/auth/logout', [AdminAuthController::class, 'logout'])
        ->name('auth.logout');
});

Route::name('feedback.')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'getDataFeedback'])
        ->name('getDataFeedback');

    Route::post('/feedback', [FeedbackController::class, 'storeFeedback'])
        ->name('storeFeedback');
});

// routes dashboard
Route::post('/EQFYzxucSMrW43N', [FasilitasSekolahController::class, 'store'])
    ->name('sekolah.storeFasilitas');

Route::put('/EQFYzxucSMrW43N/{id}', [FasilitasSekolahController::class, 'update'])
    ->name('sekolah.updateFasilitas');

Route::delete('/EQFYzxucSMrW43N/{id}', [FasilitasSekolahController::class, 'destroy'])
    ->name('sekolah.deleteFasilitas');

Route::post('/ulsMjlyY5q9cJzp', [JmlKapitaSekolahController::class, 'store'])
    ->name('sekolah.storeJmlKapita');

Route::put('/ulsMjlyY5q9cJzp/{id}', [JmlKapitaSekolahController::class, 'update'])
    ->name('sekolah.updateJmlKapita');

Route::delete('/ulsMjlyY5q9cJzp/{id}', [JmlKapitaSekolahController::class, 'destroy'])
    ->name('sekolah.deleteJmlKapita');

Route::post('/IG8yogR9sHeX9qn', [ProfilSekolahController::class, 'store'])
    ->name('sekolah.storeProfilSekolah');

Route::put('/IG8yogR9sHeX9qn/{slug}', [ProfilSekolahController::class, 'update'])
    ->name('sekolah.updateProfilSekolah');

Route::delete('/IG8yogR9sHeX9qn/{slug}', [ProfilSekolahController::class, 'destroy'])
    ->name('sekolah.deleteProfilSekolah');

Route::post('/HYyeK1RJdaFA5LT', [JenisInformasiController::class, 'store'])
    ->name('informasi.storeJenisInformasi');

Route::put('/HYyeK1RJdaFA5LT/{id}', [JenisInformasiController::class, 'update'])
    ->name('informasi.updateJenisInformasi');

Route::delete('/HYyeK1RJdaFA5LT/{id}', [JenisInformasiController::class, 'destroy'])
    ->name('informasi.deleteJenisInformasi');

Route::post('/0c7M4Vab4NKBSTX', [InformasiController::class, 'store'])
    ->name('informasi.storeInformasi');

Route::put('/0c7M4Vab4NKBSTX/{id}', [InformasiController::class, 'update'])
    ->name('informasi.updateInformasi');

Route::delete('/0c7M4Vab4NKBSTX/{id}', [InformasiController::class, 'destroy'])
    ->name('informasi.deleteInformasi');

Route::post('/3EEJWdZKepfo2iz', [TestimoniController::class, 'store'])
    ->name('testimoni.storeTestimoni');

Route::put('/3EEJWdZKepfo2iz/{id}', [TestimoniController::class, 'update'])
    ->name('testimoni.updateTestimoni');

Route::delete('/3EEJWdZKepfo2iz/{id}', [TestimoniController::class, 'destroy'])
    ->name('testimoni.deleteTestimoni');

Route::put('G4hr9iFTfa8ZMvC/{id}', [DokumenController::class, 'update'])
    ->name('dokumen.updateDokumen');

Route::delete('G4hr9iFTfa8ZMvC/{id}', [DokumenController::class, 'destroy'])
    ->name('dokumen.deleteDokumen');

Route::post('G4hr9iFTfa8ZMvC', [DokumenController::class, 'store'])
    ->name('dokumen.storeDokumen');

Route::put('aW71BJNnFvOlaHM/{id}', [JenisDokumenController::class, 'update'])
    ->name('dokumen.updateJenisDokumen');

Route::delete('aW71BJNnFvOlaHM/{id}', [JenisDokumenController::class, 'destroy'])
    ->name('dokumen.deleteJenisDokumen');

Route::post('aW71BJNnFvOlaHM', [JenisDokumenController::class, 'store'])
    ->name('dokumen.storeJenisDokumen');

Route::post('jVxC6iuhwUaNSJa', [DokumentasiSekolahController::class, 'store'])
    ->name('dokumentasi.storeDokumentasiSekolah');

Route::put('jVxC6iuhwUaNSJa/{id}', [DokumentasiSekolahController::class, 'update'])
    ->name('dokumentasi.updateDokumentasiSekolah');

Route::delete('jVxC6iuhwUaNSJa/{id}', [DokumentasiSekolahController::class, 'destroy'])
    ->name('dokumentasi.deleteDokumentasiSekolah');


