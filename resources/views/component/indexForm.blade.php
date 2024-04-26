@extends('layouts.frontOfficeLayout')
@include('component.topHeader')

@include('component.header')

@include('component.subHeaderPostuler')

@section('content')
<br><br><br>
<link href="{{ asset('plugins/select2/css/select2.css') }}" rel="stylesheet" />
<link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />



    <div class="container">

        @yield('container')
        {{-- @include('component.toastrNotification') --}}

    </div>

@include('component.footerHome')
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>


<style>
    .form-control:disabled, .form-control:read-only {
    background-color: #fcfdff;
    opacity: 1;
}
</style>

<script type= text/javascript>


    $(document).ready(function() {
    $('.select2').select2();
});

</script>
@endsection
