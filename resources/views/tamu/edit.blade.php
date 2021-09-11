@extends('template.master')

@section('title','Edit Data Tamu')

@section('titlesatu','Edit Data Tamu')
@section('titledua','Edit Data Tamu')

@section('content')
<div class="container">
    <h1>Create Tamu</h1>
    <form action="{{url('/tamu/update/'.$tamus->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="nama_tamu" class="form-label">Nama Tamu</label>
        <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" name="nama_tamu" value="{{$tamus->nama_tamu}}">
        @error('nama_tamu')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan</label>
        <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan"  style="height: 100px">{{$tamus->keperluan}}</textarea>
        @error('keperluan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="ruangans_id" class="form-label">Tujuan Ruangan</label>
        <select class="form-control @error('ruangans_id') is-invalid @enderror" aria-label="Default select example" name="ruangans_id">
            @foreach ($ruangans as $ruangan)
            <option value="{{$ruangan->id}}">{{$ruangan->nama_ruangan}}</option>
            @endforeach
        </select>
        @error('ruangans_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection