<?php

namespace App\Http\Resources;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaAcaraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'jadwal' => new JadwalResource($this->whenLoaded('jadwal')),
            'ruang' => new RuangResource($this->whenLoaded('ruang')),
            'pengawas1' => new GuruResource($this->whenLoaded('pengawas1')),
            'pengawas2' => new GuruResource($this->whenLoaded('pengawas2')),
            'jum_peserta_hadir' => $this->whenCounted('peserta_hadir'),
            'jum_peserta_absen' => $this->whenCounted('peserta_absen'),
            'catatan' => $this->catatan,
        ];
    }
}
