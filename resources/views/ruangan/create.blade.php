@extends('template.master')

@section('title','Create Tamu')

@section('titlesatu','Create Tamu')

@section('titledua','Create Tamu')

@section('content')
<div class="container">
    <h1>Create Tamu</h1>
    <form action="ruangan/store" method="POST">
        @csrf
        <div class="mb-3">
        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
        <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan">
        @error('nama_ruangan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection