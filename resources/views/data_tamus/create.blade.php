@extends('template.master')

@section('title','Create Data Tamu')

@section('titlesatu','Create Data Tamu')

@section('titledua','Create Data Tamu')

@section('content')
<div class="container">
    <h1>Create Data Tamu</h1>
    <form action="{{route('data_tamus.store')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="nokartu" class="form-label">No Kartu</label>
        <input type="text" class="form-control @error('nokartu') is-invalid @enderror" name="nokartu" autofocus value="{{old('nokartu')}}">
        @error('nokartu')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="nama" class="form-label">Nama Tamu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama">
        @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection