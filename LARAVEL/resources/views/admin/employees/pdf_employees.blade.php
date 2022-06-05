<!DOCTYPE html>
<html>

<head>
    <title>Laporan Employees</title>
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
        <h5>Laporan Employees</h5>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Company</th>
                <th>Balance</th>
                <th>Email</th>
                <th>ID Company</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->company }}</td>
                    <td>{{ $item->balance }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->id_company }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
