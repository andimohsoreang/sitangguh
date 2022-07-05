<!DOCTYPE html>
<html>
<head>
    <title>Rekap Laporan Bencana - All</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .head-center {
            text-align: center;
        }

        h3 {
            margin: 10px 0 5px 0;
        }

        h4 {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>
    <div class="head-center">
        <img src="{{ asset('be/assets/images/bpbdlogo.png') }}" alt="logo" width="80px">
        <h3>SITANGGUH</h3>
        <h4>REKAP LAPORAN BENCANA</h4>
    </div>
    <table width="100%">
        <tr>
            <th>No</th>
            <th>Pelapor</th>
            <th>Kronologi</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th>status</th>
            <th>kerusakan</th>
            <th>Total Kerugian</th>
            <th>Petugas</th>
        </tr>
        @foreach ($laporan_bencana as $lpb)
        <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td>{{ $lpb->user->name }}</td>
            <td>{{ $lpb->kronologi }}</td>
            <td>{{ $lpb->waktu }}</td>
            <td>{{ $lpb->tanggal }}</td>
            <td>{{ $lpb->status  }}</td>
            <td>{{ $lpb->kerusakan ?? '-' }}</td>
            <td>{{ $lpb->kerugian ?? '-' }}</td>
            <td>{{ $lpb->petugas->name }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>