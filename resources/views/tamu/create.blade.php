@extends('template.master')

@section('title','Create Tamu')

@section('titlesatu','Create Tamu')

@section('titledua','Create Tamu')

@section('content')
<div class="container">
    <h1>Create Tamu</h1>
    <form action="{{route('tamu.store')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="nama_tamu" class="form-label">Nama Tamu</label>
        {{-- <select class="form-control" aria-label="Default select example" name="nama_tamu">
            <option disabled>Nama Tamu</option> --}}
            {{-- <option value="1">One</option> --}}
            {{-- @foreach ($data_tamus as $data_tamu)
            <option value="{{$data_tamu->nama}}">{{$data_tamu->nama}}</option>
            @endforeach
        </select> --}}
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." name="nama_tamu">
        <datalist id="datalistOptions">
        @foreach ($data_tamus as $data_tamu)
        <option value="{{$data_tamu->nama}}">
        @endforeach
        </datalist>
        @error('nama_tamu')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="keperluan" class="form-label">Keperluan</label>
        <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan"  style="height: 100px"></textarea>
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