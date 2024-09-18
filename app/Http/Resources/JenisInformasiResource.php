<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JenisInformasiResource extends JsonResource
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
            'nama_jenis' => $this->nama_jenis, // Adjust based on your fields
        ];
    }
}
