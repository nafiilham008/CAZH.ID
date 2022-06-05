<!DOCTYPE html>
<html>

<head>
    <title>Laporan Companies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Companies</h5>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Company</th>
                <th>Email</th>
                <th>Balance</th>
                <th>Web</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $companies)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $companies->nama }}</td>
                    <td>{{ $companies->email }}</td>
                    <td>{{ $companies->balance }}</td>
                    <td>{{ $companies->web }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
