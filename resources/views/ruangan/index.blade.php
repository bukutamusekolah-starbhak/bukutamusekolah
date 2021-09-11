@extends('template.master')

@section('title',' Data Ruangan')

@section('titlesatu','Ruangan')

@section('titledua','Ruangan')

@section('content')
<h1>Data Ruangan</h1>

{{-- menambahkan notifikasi ketika berhasil --}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<a href="ruangan.create" class="btn btn-primary my-3">Tambah Ruangan</a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Ruangan</th>
        <th scope="col">Aksi</th>
      </tr>
      <tr>
      @foreach ($ruangans as $ruangan)
        <td>{{$loop->iteration}}</td>
        <td>{{$ruangan->nama_ruangan}}</td>
        <td>
         <a href="ruangan/edit/{{$ruangan->id}}" class="btn btn-warning">Edit</a>
            <form action="/ruangan/destroy/{{$ruangan->id}}" method="post" style="display: inline-block;" onclick="return confirm('are you sure');">
              @csrf
              @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
            </form>
        </td>
        </tr>
      @endforeach
    </thead>
    <tbody>
@endsection