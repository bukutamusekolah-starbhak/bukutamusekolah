@extends('template.master')

@section('title','Edit Data Tamu')

@section('titlesatu','Edit Data Tamu')
@section('titledua','Edit Data Tamu')

@section('content')
<div class="container">
    <h1>Create Tamu</h1>
    <form action="/ruangan/update/{{$ruangans->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
        <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan" value="{{$ruangans->nama_ruangan}}">
        @error('nama_ruangan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection