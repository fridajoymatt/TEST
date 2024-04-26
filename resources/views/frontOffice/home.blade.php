@extends('layouts.frontOfficeLayout')

@section('content')
@include('component.topHeader')
@include('component.header')
@include('component.subHeaderHome')


@include('component.homeContent')

@include('component.footerHome')
@endsection
