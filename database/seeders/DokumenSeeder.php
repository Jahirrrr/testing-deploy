<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen')->insert([
            [
                'nama_panduan' => 'Panduan Pengguna',
                'deskripsi' => 'Panduan lengkap untuk pengguna baru.',
                'jenis_dokumen_id' => 1,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Panduan Admin',
                'deskripsi' => 'Panduan lengkap untuk administrator.',
                'jenis_dokumen_id' => 1,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 1',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ... Repeat for Buku 2 to Buku 18
            [
                'nama_panduan' => 'Buku 2',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 3',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 4',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 5',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 6',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 7',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 8',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 9',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 10',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 11',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 12',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 13',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 14',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 15',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 16',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 17',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panduan' => 'Buku 18',
                'deskripsi' => 'Buku Lengkap untuk Pengguna baru.',
                'jenis_dokumen_id' => 2,
                'image' => '/Images/Infografis/infografis-3.jpeg',
                'dokumen_link' => '/Images/Infografis/infografis-3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}