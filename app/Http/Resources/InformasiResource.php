<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InformasiResource extends JsonResource
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
            'id' => $this->id,
            'jenis_id' => $this->jenis_id,
            'gambar' => $this->gambar,
            'judul' => $this->judul,
            'body' => $this->body,
            'jenis_informasi' => new JenisInformasiResource($this->whenLoaded('jenisInformasi')),
        ];
    }
}
