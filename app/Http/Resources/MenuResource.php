<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'kode_menu' => $this->kode_menu,
            'nama_menu' => $this->nama_menu,
            'kategori' => $this->kategori->nama_kategori, // Assuming relationship with Kategori
            'harga' => $this->harga,
            'jumlah' => $this->jumlah,
        ];
    }
}
