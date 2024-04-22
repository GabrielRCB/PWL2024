@extends('layout.main')
@section('judul',"Halaman Murid")
@section('content')
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
<table class="table">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Jumlah Siswa Perwakilan</th>
    </tr>
    @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->dob}}</td>
            <td>{{$student->teacher->count()}} Orang</td>
        </tr>

    @endforeach
</table>
        </div>
        </div>
        </div>
    </div>
@endsection
