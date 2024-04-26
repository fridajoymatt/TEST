





{{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}
<link rel="stylesheet" href="{{ asset('component/toastr.js/latest/css/toastr.min.css') }}">
</head>
<body class="antialiased">
    <script src="{{ asset('component/toastr.js/latest/jquery/2.2.4/jquery.min.js') }}"></script>


<script src="{{ asset('component/toastr.js/latest/js/toastr.min.js') }}"></script>
    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}

@if(session('success'))
        {!!         Toastr::success(session('success'), 'Succès !!')        !!}
        {!! Toastr::message() !!}

@elseif (session('warning'))
        {!!         Toastr::warning(session('warning'), 'Attention !!')        !!}

        {!! Toastr::message() !!}

@elseif (session('danger'))
        {!!         Toastr::error(session('danger'), 'Attention ❌')        !!}
        {!! Toastr::message() !!}
@endif


