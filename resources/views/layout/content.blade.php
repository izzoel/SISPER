@extends('layout.main')

@section('skpi')
    @if (Request::segment(1) === 'skpi' && Request::segment(2) !== 'admin')
        @include('skpi.main')
    @endif
@endsection

@section('ijazah')
    @if (Request::segment(1) === 'dversi')
        @include('dversi.dversi_ijazah_main')
    @endif
@endsection
