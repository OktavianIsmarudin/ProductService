<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class UserConsumerController extends Controller
{
    public function getSiswa($id) {
        $response = Http::get("http://localhost:8001/api/siswas/$id");

        if ($response->successful()) {
            return $response->json(); // kembalikan data siswa
        } else {
            return response()->json(['error' => 'Siswa tidak ditemukan'], 404);
        }
    }
}

