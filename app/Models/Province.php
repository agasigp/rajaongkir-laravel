<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;
    use Sushi;

    protected $schema = [
        'province_id' => 'integer',
    ];

    public function getRows()
    {
        $endpoint = config('rajaongkir.url');
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get("{$endpoint}/starter/province");

        return $response->json()['rajaongkir']['results'];
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'province_id');
    }

    protected function sushiShouldCache()
    {
        return true;
    }
}
