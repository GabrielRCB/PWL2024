
<h1>Data Guru</h1>
<table border ='1'>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Jumlah Siswa Perwakilan</th>
    </tr>
    @foreach($teachers as $teacher)
        <tr>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->email}}</td>
            <td>{{$teacher->dob}}</td>
            <td>{{$teacher->students->count()}} Orang</td>
        </tr>

    @endforeach
</table>
