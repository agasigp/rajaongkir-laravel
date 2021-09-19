<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    use Sushi;

    protected $schema = [
        'province_id' => 'integer',
        'city_id' => 'integer',
        'postal_code' => 'integer',
    ];

    public function getRows()
    {
        $endpoint = config('rajaongkir.url');
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get("{$endpoint}/starter/city");

        return $response->json()['rajaongkir']['results'];
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
