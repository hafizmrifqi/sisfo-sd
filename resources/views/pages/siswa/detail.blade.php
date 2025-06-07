@extends('layouts.app')

@section('content')
    <h1>Detail Siswa</h1>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>NIPD:</strong> {{ $siswa->nipd }}</p>

    <h2>Generate Rapot</h2>

    <form action="{{ route('siswa.generateRapot', $siswa->id) }}" method="GET">
        <label for="jenis">Jenis Nilai:</label>
        <select name="jenis" id="jenis">
            <option value="harian">Harian</option>
            <option value="uts">UTS</option>
            <option value="uas">UAS</option>
        </select>

        <label for="tingkat">Tingkat:</label>
        <select name="tingkat" id="tingkat">
            @for ($i = 1; $i <= 6; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <label for="semester">Semester:</label>
        <select name="semester" id="semester">
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select>

        <button type="submit" class="btn btn-primary">Generate PDF</button>
    </form>
@endsection
