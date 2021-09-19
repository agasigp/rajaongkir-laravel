<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {
        $citiesFromJogja = City::where('province', 'DI Yogyakarta')->get();
        return view('form', [
            'jogja_city' => $citiesFromJogja,
        ]);
    }

    public function cekOngkir()
    {
        $endpoint = config('rajaongkir.url');
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key'),
            'content-type' => 'application/x-www-form-urlencoded',
        ])
            ->asForm()
            ->post("{$endpoint}/starter/cost", [
                'origin' => request('city_origin'),
                'destination' => request('city_destination'),
                'weight' => request('weight'),
                'courier' => request('courier'),
            ]);

        $originCity = $response->json()['rajaongkir']['origin_details'];
        $destinationCity = $response->json()['rajaongkir']['destination_details'];
        $results = $response->json()['rajaongkir']['results'];
        $query = $response->json()['rajaongkir']['query'];

        return view('results', compact('originCity', 'destinationCity', 'results', 'query'));
    }
}
