<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @livewireStyles
    <title>For Cek Ongkir</title>
</head>
<body>
    <h1>Cek Ongkir Dari Jogja Ke Kota Lain</h1>
    <form action="{{ url('cek-ongkir') }}" method="POST">
        @csrf
        <strong>Dari</strong><br>
        Kabupaten/Kota :
        <select name="city_origin">
            @foreach ($jogja_city as $item)
                <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
            @endforeach
        </select> <br>
        <strong>Ke</strong><br>
        @livewire('cek-ongkir-form', [
            'province' => 0,
            'city' => 0,
        ])
        Kurir :
        <select name="courier">
            <option value="jne">JNE</option>
            <option value="pos">POS Indonesia</option>
            <option value="tiki">TIKI</option>
        </select> <br>
        Berat (gr) : <input type="number" min="1" name="weight" required><br>
        <button>Cek</button>
    </form>
    @livewireScripts
</body>
</html>
