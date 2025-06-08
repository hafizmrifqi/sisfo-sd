<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Anggota Kelas - {{ $kelas->nama_kelas }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h2, h4 { margin: 0; padding: 0; }
    </style>
</head>
<body>
    <h2>Daftar Anggota Kelas</h2>
    <br>
    <h4>Nama Kelas: {{ $kelas->nama_kelas }}</h4>
    <h4>Pengajar: {{ optional($kelas->walas)->nama ?? '-' }}</h4>
    <h4>Tahun Ajaran: {{ $kelas->tahun_ajaran }} / {{ $kelas->tahun_ajaran + 1 }}</h4>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NIPD</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas->siswa as $i => $siswa)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->nipd }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
