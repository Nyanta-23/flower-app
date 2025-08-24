<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plants list</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            margin: auto;
            background-color: #fff;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #fafafa;
            color: rgb(67, 67, 67);
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Plants List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>QR Code</th>
                    <th>Plant Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="data:image/png;base64,{{ $item->qr_code }}" alt="QR Code" width="200"></td>
                        <td>
                          <small>
                            Nama: {{ $item->name }} ({{ $item->slug }}) <br>
                            Kategori: {{ $item->category->name }} <br>
                            Scientific Name: {{ $item->scientific_name }} <br>
                            Habitat: {{ $item->habitat }} <br>
                            Growth Rate: {{ $item->growth_rate }} <br>
                            Watering Needs: {{ $item->watering_needs }} <br>
                            Sunlight Needs: {{ $item->sunlight_needs }} <br>
                            Soil Level: {{ $item->soil_level }} <br>
                            Temperature Range: {{ $item->temperature_range }}

                          </small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
