@extends('template.master')

@section('title','Mode Absensi')

@section('titlesatu','Mode Absensi')
@section('titledua','Mode Absensi')

@section('content')
<h1>Mode Absensi</h1>

{{-- @foreach ($statuss as $status)
    {{$status->mode_absensi}}
@endforeach --}}
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Mode Absen</th>
        <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($statuss as $status)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$status->mode_absensi}}</td>
        <td>
            <a href="/modeabsensi/edit/{{$status->id}}" class="btn btn-success">Edit</a>
            <form action="/modeabsensi/destroy/{{$status->id}}" method="post" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
        @endforeach
    </tr>
    </tbody>
</table>
@endsection