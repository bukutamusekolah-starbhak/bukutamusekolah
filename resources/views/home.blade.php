@extends('template.master')

@section('title','Dashboard Home')

@section('titlesatu','Dashboard Home')
@section('titledua','Dashboard Home')

@section('content')
{{-- card header --}}
<div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{Auth::user()->name}}
    {{ __('You are logged in!') }}
    {{-- end section  --}}
@endsection
