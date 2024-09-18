<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilSekolahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'profil_sekolah' => [
                'id' => $this->id,
                'nama_sekolah' => $this->nama_sekolah,
                'NPSN' => $this->NPSN,
                'alamat' => $this->alamat,
                'kecamatan' => $this->kecamatan,
                'no_telepon' => $this->no_telepon,
                'email' => $this->email,
                'link_website' => $this->link_website,
                'nama_kontak_person' => $this->nama_kontak_person,
                'jabatan' => $this->jabatan,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'jenjang' => $this->whenLoaded('jenjang'),
            'kapita' => $this->whenLoaded('kapita'),
            'fasilitas' => $this->whenLoaded('fasilitas'),
            'dokumentasi' => $this->whenLoaded('dokumentasi'),
        ];
    }
}
