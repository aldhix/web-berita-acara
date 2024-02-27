<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesertaHadirResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'berita_acara'=>BeritaAcaraResource::collection($this->whenLoaded('berita_acara')),
            'nama'=>$this->nama
        ];
    }
}
