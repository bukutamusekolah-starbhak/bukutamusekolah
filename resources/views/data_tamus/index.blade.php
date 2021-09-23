@extends('template.master')

@section('title','Pendaftaran Tamu')

@section('titlesatu','Pendaftaran Tamu')
@section('titledua','Pendaftaran Tamu')

@section('content')
<div class="container">
    <h1>Data Tamu</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{route('data_tamus.create')}}" class="btn btn-primary my-3">Tambah Data Tamu</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">No Kartu</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data_tamus as $no => $datatamu)
        <tr>
            <td>{{$no+1}}</td>
            <td>{{$datatamu->nama}}</td>
            <td>{{$datatamu->nokartu}}</td>
            <td>
                <a href="{{route('data_tamus.edit',$datatamu->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('data_tamus.destroy',$datatamu->id)}}" method="post" style="display: inline-block;" onsubmit="return confirm('apa anda yakiin?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>
@endsection