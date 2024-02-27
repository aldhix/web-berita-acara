<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
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
            'hari'=>$this->hari,
            'tanggal'=>$this->tanggal,
            'jam_ke'=>$this->jam_ke,
            'sesi'=>$this->sesi,
            'waktu_mulai'=> substr($this->waktu_mulai, 0, 5),
            'waktu_selesai'=> substr($this->waktu_selesai, 0, 5),
            'nama_mapel'=>$this->nama_mapel
        ];
    }
}
