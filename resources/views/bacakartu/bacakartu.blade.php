@extends('template.master')

@section('css')
<link rel="stylesheet" href="cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
@endsection

@section('title','Scan Kartu')
@section('titlesatu','Scan Kartu')
@section('titledua','Scan Kartu')

@section('content')
<div class="container">
    <h3 class="text-center">Silahkan Scan Kartu Rfid Di Sini</h3>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('erorr'))
<div class="alert alert-danger">
    {{ session('erorr') }}
</div>
@endif
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Masuk</button>
    </li>
    <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pulang</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @foreach ($statuss as $status)
        @if($status->mode_absensi == 'masuk')
        <h3>Absen {{"Masuk"}}</h3>
        @endif
        @endforeach
        <p class="text-center mt-2">
            <img src="{{asset('Bahan Absensi RFID/images/rfid.png')}}"  style="width: 300px;" alt="">
        </p>
        <p class="text-center">
            <img src="{{asset('Bahan Absensi RFID/images/animasi1.gif')}}" alt="">
        </p>
        <form action="absensi/store" method="POST">
        @csrf
        <div class="mb-3" style="display: none;">
            <label for="data_tamus_id" class="form-label">Nama Tamu</label>
            <select class="form-control" aria-label="Default select example" name="data_tamus_id">
                @foreach ($data_tamus as $data_tamu)
                <option value="{{$data_tamu->id}}">{{$data_tamu->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="keperluan">Keperluan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="keperluan" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="ruangans_id" class="form-label">Tujuan Ruangan</label>
            <select class="form-control" aria-label="Default select example" name="ruangans_id">
                @foreach ($ruangans as $ruangan)
                <option value="{{$ruangan->id}}">{{$ruangan->nama_ruangan}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            {{-- <label for="nokartu">No Kartu</label> --}}
            <input type="text"  name="nokartu" id="nokartu" style="opacity: 0;" class="form-control @error('nokartu') is-invalid @enderror" autofocus value="{{old('nokartu')}}">
            <small class="text-danger">@error('nokartu')
            scan dulu ya
            @enderror
        </small>
        </div>
            {{-- <input type="text" name="data_tamus_id" id="" class="form-control"> --}}
            {{-- <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search..." name="data_tamus_id">
            <datalist id="datalistOptions">
            @foreach ($data_tamus as $data_tamu)
            <option value="{{$data_tamu->id}}">{{$data_tamu->nokartu}}
            </option>
            @endforeach
            </datalist> --}}
            <button type="submit" class="btn btn-primary" style="background-color:transparent;border:transparent;color:transparent;">Submit</button>
        </form>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @foreach ($statuss as $status)
        @if($status->mode_absensi == 'pulang')
        <h3>Absen {{"Pulang"}}</h3>
        @endif
        @endforeach
        <table id="myTable" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Pengunjung</th>
                    <th>No Kartu</th>
                    <th>Jam Pulang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                @foreach ($absensis as $absensi)
                <td>
                    @if ($absensi->waktu_kepulangan == NULL)
                    {{$absensi->data_tamus->nama}}
                    @else
                    {{$absensi->data_tamus->nama}}
                    @endif
                </td>
                <td>
                    @if ($absensi->waktu_kepulangan == NULL)
                    {{$absensi->nokartu}}
                    @else
                    {{$absensi->nokartu}}
                    @endif
                </td>
                <td>
                @if ($absensi->waktu_kepulangan == NULL)
                <form action="/absensi/update/{{$absensi->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="nokartu" class="form-control">
                    <button class="btn btn-success my-2 w-100">Scan Pulang</button>
                    </form>
                @else
                {{$absensi->waktu_kepulangan}}
                @endif
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
    </div>
</div>
@push('script')
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    $(".container").hover(function() {
        $("#nokartu").focus()
    })
} );
</script>
@endpush
@endsection