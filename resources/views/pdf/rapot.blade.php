<!-- resources/views/pdf/rapot.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapot {{ $siswa->nama }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
</head>
<body>
    <h2>Rapot {{ ucfirst($jenis) }} - Semester {{ $semester }} - Kelas {{ $tingkat }}</h2>
    <p>Nama: {{ $siswa->nama }}</p>
    <p>NIPD: {{ $siswa->nipd }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mapel</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilaiList as $i => $nilai)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $nilai->mapel->nama_mapel }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
