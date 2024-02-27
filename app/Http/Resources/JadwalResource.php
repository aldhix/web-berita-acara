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
            'waktu_mulai'=>$this->waktu_mulai,
            'waktu_selesai'=>$this->waktu_selesai,
            'nama_mapel'=>$this->nama_mapel
        ];
    }
}
