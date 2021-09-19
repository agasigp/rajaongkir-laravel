<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Province;

class CekOngkirForm extends Component
{
    public $province;
    public $city;
    public $cities = [];

    public function mount($province, $city)
    {
        $this->province = $province;
        $this->city = $city;
    }

    public function render()
    {
        $this->cities = City::where('province_id', $this->province)->get();

        return view('livewire.cek-ongkir-form')
            ->with('provinces', Province::orderBy('name', 'asc')->get());
    }
}
