@extends('layout.template')

@if (is_null(Auth::user()))
    @section('forpi_submit')
        @include('auth.forpi.pages.submit')
    @endsection
@else
    @section('forpi_mahasiswa')
        @include('auth.forpi.pages.mahasiswa')
    @endsection
@endif
