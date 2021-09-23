@extends('template.master')

@section('title','Rekap Tamu')
@section('titlesatu','Rekap Tamu')
@section('titledua','Rekap Tamu')

@section('content')
<div class="container">
    <h1 class="mt-2 mb-2">Rekap Tamu</h1>
    <a href="/absensi/export_excel" class="my-3 btn btn-success">Export Excel</a>
    <div class="table-scrollable">
        <table class="table table-bordered table-hover" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Tujuan Ruangan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Jam Pulang</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($absensis as $absensi)
            <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$absensi->data_tamus->nama}}</td>
            <td>{{$absensi->keperluan}}</td>
            <td>{{$absensi->ruangans->nama_ruangan}}</td>
            <td>{{$absensi->tanggal}}</td>
            <td>{{$absensi->waktu_kedatangan}}</td>
            <td>
                @if ($absensi->waktu_kepulangan == NULL)
                {{"00.00.00"}}
                @else
                {{$absensi->waktu_kepulangan}}
                @endif
            </td>
            @empty
            <td colspan="6" class="text-center">{{"data tidak ada"}}</td>
            @endforelse
            </tr>
            <tr>
            </tbody>
        </table>
    </div>
</div>
<style>
.table-scrollable{
overflow-x: auto;
max-width: 100%;
/* box-shadow: inset 0 0 5px rgba(150, 150 ,150,0.35); */
margin: auto;
}
</style>
@endsection