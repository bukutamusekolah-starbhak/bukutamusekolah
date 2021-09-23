@extends('template.master')

@section('title','Edit Data Tamu')

@section('titlesatu','Edit Data Tamu')

@section('titledua','Edit Data Tamu')

@section('content')
<div class="container">
    <h1>Create Data Tamu</h1>
    <form action="{{route('data_tamus.update',$data_tamus->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
        <label for="no_kartu" class="form-label">No Kartu</label>
        <input type="text" class="form-control @error('no_kartu') is-invalid @enderror" name="nokartu" value="{{$data_tamus->nokartu}}">
        @error('no_kartu')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="nama" class="form-label">Nama Tamu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  value="{{$data_tamus->nama}}">
        @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection