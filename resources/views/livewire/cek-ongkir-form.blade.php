<div>
    Provinsi :
    <select name="province_id" wire:model="province">
        @foreach ($provinces as $item)
            <option value="{{ $item->province_id }}">{{ $item->province }}</option>
        @endforeach
    </select>

    Kabupaten/Kota :
    <select name="city_destination" wire:model="city">
        @foreach ($cities as $item)
            <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
        @endforeach
    </select>
</div>
