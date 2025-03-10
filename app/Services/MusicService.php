<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MusicService
{
    protected $apiUrl = 'https://api.deezer.com/search';

    public function buscarCancion($cancion)
    {
        $response = Http::withOptions([
            'verify' => false  // 🔴 Desactiva la verificación SSL (solo para desarrollo local)
        ])->get($this->apiUrl, [
            'q' => $cancion
        ]);
    
        if ($response->successful() && isset($response['data'][0])) {
            return [
                'titulo' => $response['data'][0]['title'],
                'artista' => $response['data'][0]['artist']['name'],
                'caratula' => $response['data'][0]['album']['cover_medium']
            ];
        }
    
        return null;
    }
    
}
