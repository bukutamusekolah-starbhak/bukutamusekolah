@extends('template.master')

@section('title',' Data Tamu')

@section('titlesatu','Tamu')

@section('titledua','Tamu')

@section('content')
<h1>Data Tamu</h1>

{{-- menambahkan notifikasi ketika berhasil --}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<a href="{{ route('tamu.create')}}" class="btn btn-primary my-3">Tambah Tamu</a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Tamu</th>
        <th scope="col">Keperluan</th>
        <th scope="col">Tujuan Ruangan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($tamus as $tamu)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$tamu->nama_tamu}}</td>
        <td>{{$tamu->keperluan}}</td>
        <td>{{$tamu->ruangans->nama_ruangan}}</td>
        <td>
            <a href="{{route('tamu.edit',$tamu->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{route('tamu.destroy',$tamu->id)}}" method="post" style="display: inline-block;" onclick="return confirm('are you sure');">
              @csrf
              @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
      </tr>
    </tbody>
@empty
<td>{{"not a data"}}</td>
@endforelse
@endsection