<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ongkir {{ $originCity['city_name'] }} - {{ $destinationCity['city_name'] }}</title>
</head>
<body>
    <h1>Cek Ongkir {{ $originCity['city_name'] }} - {{ $destinationCity['city_name'] }} Berat {{ $query['weight'] }} gr</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Kurir</th>
                <th>Jenis Layanan</th>
                <th>Tarif</th>
                <th>Estimasi Pengiriman</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results[0]['costs'] as $item)
                <tr>
                    <td>
                        <strong>{{ $results[0]['code'] }}</strong> - {{ $results[0]['name'] }}
                    </td>
                    <td>
                        <strong>{{ $item['service'] }} - {{ $item['description'] }}</strong>
                    </td>
                    <td>
                        {{ rupiah($item['cost'][0]['value']) }}
                    </td>
                    <td>
                        {{ $item['cost'][0]['etd'] }} hari
                    </td>
                    <td>
                        {{ $item['cost'][0]['note'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="/">Kembali</a>
</body>
</html>
