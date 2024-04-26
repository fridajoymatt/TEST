        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <body class="antialiased">
        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


        {!! Toastr::message() !!}

{{--
@if(Session::has('alert-success'))
    <script>
        Toastify({ text: "{{ Session::get('alert-success') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
        }).showToast();
    </script>
@elseif (Session::has('alert-warning'))
    <script>
        Toastify({ text: "{{ Session::get('alert-warning') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
        }).showToast();
    </script>
@elseif (Session::has('alert-danger'))
    <script>
        Toastify({ text: "{{ Session::get('alert-danger') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
        }).showToast();
    </script>
@endif --}}
