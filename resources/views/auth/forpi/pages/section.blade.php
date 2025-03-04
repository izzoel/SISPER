@extends('layout.template')

@php
    $sectionName = is_null(Auth::user()) ? 'forpi_submit' : 'forpi_' . request()->segment(2);
    $viewName = is_null(Auth::user()) ? 'auth.forpi.pages.submit' : 'auth.forpi.pages.' . request()->segment(2);
@endphp

@section($sectionName)
    @include($viewName)
@endsection
