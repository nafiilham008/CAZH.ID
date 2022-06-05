<!DOCTYPE html>
<html>

<head>
    <title>Laporan History</title>
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
        <h5>Laporan History</h5>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Company</th>
                <th>ID Employee</th>
                <th>Balance</th>
                <th>Company Start Balance</th>
                <th>Company Last Balance</th>
                <th>Employees Start Balance</th>
                <th>Employees Last Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $item->id_company }}</td>
                    <td>{{ $item->id_employee }}</td>
                    <td>{{ $item->balance }}</td>
                    <td>{{ $item->company_start_balance }}</td>
                    <td>{{ $item->company_last_balance }}</td>
                    <td>{{ $item->employees_start_balance }}</td>
                    <td>{{ $item->employees_last_balance }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
