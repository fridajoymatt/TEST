@extends('layouts.backOfficeLayout')

@section('title')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tableau de bord</h5>
                    <p class="m-b-0">Consulter les satistiques</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Tableau de bord</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- Material statustic card start -->
                    {{-- <div class="col-xl-4 col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-user text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>10K</h5>
                                                <p class="text-muted m-b-0">Offre total crées</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-volume-down text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>100%</h5>
                                                <p class="text-muted m-b-0">Ofrre en cours</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-file-alt text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>2000+</h5>
                                                <p class="text-muted m-b-0">Offre expirées</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="far fa-envelope-open text-c-blue f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>120</h5>
                                                <p class="text-muted m-b-0">Offre supprimées</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12">
                        <div class="card mat-stat-card">
                            <div class="card-block">
                                <div class="row align-items-center b-b-default">
                                    <div class="col-sm-6 b-r-default p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-share-alt text-c-purple f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>1000</h5>
                                                <p class="text-muted m-b-0">Total de candidatures</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-sitemap text-c-green f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>600</h5>
                                                <p class="text-muted m-b-0">Candidature acceptées</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-6 p-b-20 p-t-20 b-r-default">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-signal text-c-red f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>350</h5>
                                                <p class="text-muted m-b-0">Candidatures en attente</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-b-20 p-t-20">
                                        <div class="row align-items-center text-center">
                                            <div class="col-4 p-r-0">
                                                <i class="fas fa-wifi text-c-blue f-24"></i>
                                            </div>
                                            <div class="col-8 p-l-0">
                                                <h5>100%</h5>
                                                <p class="text-muted m-b-0">Candidatures refusées</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xl-4 col-md-12">
                        <div class="card mat-clr-stat-card text-white green ">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3 text-center bg-c-green">
                                        <i class="fas fa-star mat-icon f-24"></i>
                                    </div>
                                    <div class="col-9 cst-cont">
                                        <h5>4000+</h5>
                                        <p class="m-b-0">Ratings Received</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mat-clr-stat-card text-white blue">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-3 text-center bg-c-blue">
                                        <i class="fas fa-trophy mat-icon f-24"></i>
                                    </div>
                                    <div class="col-9 cst-cont">
                                        <h5>17</h5>
                                        <p class="m-b-0">Achievements</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Material statustic card end -->
                    <!-- order-visitor start -->


                    <!-- order-visitor end -->

                    <!--  sale analytics start -->

                    <div class="col-xl-6 col-md-12">
                        <div class="row">
                            <!-- sale card start -->

                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Total Subscription</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>7652</h4>
                                        <p class="m-b-0">48% From Last 24 Hours</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Order Status</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>6325</h4>
                                        <p class="m-b-0">36% From Last 6 Months</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="card bg-c-red total-card">
                                    <div class="card-block">
                                        <div class="text-left">
                                            <h4>489</h4>
                                            <p class="m-0">Total Comment</p>
                                        </div>
                                        <span class="label bg-c-red value-badges">15%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-c-green total-card">
                                    <div class="card-block">
                                        <div class="text-left">
                                            <h4>$5782</h4>
                                            <p class="m-0">Income Status</p>
                                        </div>
                                        <span class="label bg-c-green value-badges">20%</span>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Unique Visitors</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-down m-r-15 text-c-red"></i>652</h4>
                                        <p class="m-b-0">36% From Last 6 Months</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-center order-visitor-card">
                                    <div class="card-block">
                                        <h6 class="m-b-0">Monthly Earnings</h6>
                                        <h4 class="m-t-15 m-b-15"><i class="fa fa-arrow-up m-r-15 text-c-green"></i>5963</h4>
                                        <p class="m-b-0">36% From Last 6 Months</p>
                                    </div>
                                </div>
                            </div>
                            <!-- sale card end -->
                        </div>
                    </div>

                    <!--  sale analytics end -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Extra Area Chart</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                            <div class="card-block">
                                <div id="morris-extra-area" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="347" version="1.1" width="1457.41" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.796875px; top: -0.296875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="32.5234375" y="313.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.0234375,313.5H1432.41" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.5234375" y="241.375" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">50</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.0234375,241.375H1432.41" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.5234375" y="169.25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">100</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.0234375,169.25H1432.41" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.5234375" y="97.12500000000003" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.250000000000028" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">150</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.0234375,97.12500000000003H1432.41" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="32.5234375" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">200</tspan></text><path fill="none" stroke="#5fbeaa" d="M45.0234375,25H1432.41" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="1432.41" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016</tspan></text><text x="1201.2844430340028" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan></text><text x="970.1588860680056" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2014</tspan></text><text x="739.0333291020083" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan></text><text x="507.27455143199455" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan></text><text x="276.14899446599725" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011</tspan></text><text x="45.0234375" y="326" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,6.75)"><tspan dy="4.25" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010</tspan></text><path fill="#fad0c3" stroke="none" d="M45.0234375,313.5C102.80482674149931,295.46875,218.36760522449794,244.98125,276.14899446599725,241.375C333.93038370749656,237.76874999999998,449.49316219049524,286.4506583447332,507.27455143199455,284.65C565.214245849498,282.8444083447332,681.0936346845049,228.75559165526676,739.0333291020083,226.95C796.8147183435076,225.14934165526677,912.3774968265063,263.9140625,970.1588860680056,270.225C1027.9402753095048,276.53593750000005,1143.5030537925036,273.83125,1201.2844430340028,277.4375C1259.065832275502,281.04375,1374.6286107585008,293.665625,1432.41,299.075L1432.41,313.5L45.0234375,313.5Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#fb9678" d="M45.0234375,313.5C102.80482674149931,295.46875,218.36760522449794,244.98125,276.14899446599725,241.375C333.93038370749656,237.76874999999998,449.49316219049524,286.4506583447332,507.27455143199455,284.65C565.214245849498,282.8444083447332,681.0936346845049,228.75559165526676,739.0333291020083,226.95C796.8147183435076,225.14934165526677,912.3774968265063,263.9140625,970.1588860680056,270.225C1027.9402753095048,276.53593750000005,1143.5030537925036,273.83125,1201.2844430340028,277.4375C1259.065832275502,281.04375,1374.6286107585008,293.665625,1432.41,299.075" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.0234375" cy="313.5" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="276.14899446599725" cy="241.375" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="507.27455143199455" cy="284.65" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="739.0333291020083" cy="226.95" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="970.1588860680056" cy="270.225" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1201.2844430340028" cy="277.4375" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1432.41" cy="299.075" r="0" fill="#fb9678" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#afb1db" stroke="none" d="M45.0234375,313.5C102.80482674149931,308.090625,218.36760522449794,300.878125,276.14899446599725,291.8625C333.93038370749656,282.846875,449.49316219049524,240.83480249658004,507.27455143199455,241.375C565.214245849498,241.91667749658004,681.0936346845049,290.77322503419975,739.0333291020083,296.19C796.8147183435076,301.5919750341997,912.3774968265063,296.91125,970.1588860680056,284.65C1027.9402753095048,272.38874999999996,1143.5030537925036,196.29687500000003,1201.2844430340028,198.10000000000002C1259.065832275502,199.90312500000002,1374.6286107585008,273.83125,1432.41,299.075L1432.41,313.5L45.0234375,313.5Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#7e81cb" d="M45.0234375,313.5C102.80482674149931,308.090625,218.36760522449794,300.878125,276.14899446599725,291.8625C333.93038370749656,282.846875,449.49316219049524,240.83480249658004,507.27455143199455,241.375C565.214245849498,241.91667749658004,681.0936346845049,290.77322503419975,739.0333291020083,296.19C796.8147183435076,301.5919750341997,912.3774968265063,296.91125,970.1588860680056,284.65C1027.9402753095048,272.38874999999996,1143.5030537925036,196.29687500000003,1201.2844430340028,198.10000000000002C1259.065832275502,199.90312500000002,1374.6286107585008,273.83125,1432.41,299.075" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.0234375" cy="313.5" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="276.14899446599725" cy="291.8625" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="507.27455143199455" cy="241.375" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="739.0333291020083" cy="296.19" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="970.1588860680056" cy="284.65" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1201.2844430340028" cy="198.10000000000002" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1432.41" cy="299.075" r="0" fill="#7e81cb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#0ddbe4" stroke="none" d="M45.0234375,313.5C102.80482674149931,311.696875,218.36760522449794,313.5,276.14899446599725,306.2875C333.93038370749656,294.56718750000005,449.49316219049524,220.09763166894666,507.27455143199455,219.7375C565.214245849498,219.37638166894666,681.0936346845049,313.33325410396714,739.0333291020083,303.4025C796.8147183435076,293.49887910396717,912.3774968265063,146.3503125,970.1588860680056,140.4C1027.9402753095048,134.4496875,1143.5030537925036,235.96562500000002,1201.2844430340028,255.8C1259.065832275502,275.63437500000003,1374.6286107585008,288.25625,1432.41,299.075L1432.41,313.5L45.0234375,313.5Z" fill-opacity="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 0.8;"></path><path fill="none" stroke="#01c0c8" d="M45.0234375,313.5C102.80482674149931,311.696875,218.36760522449794,313.5,276.14899446599725,306.2875C333.93038370749656,294.56718750000005,449.49316219049524,220.09763166894666,507.27455143199455,219.7375C565.214245849498,219.37638166894666,681.0936346845049,313.33325410396714,739.0333291020083,303.4025C796.8147183435076,293.49887910396717,912.3774968265063,146.3503125,970.1588860680056,140.4C1027.9402753095048,134.4496875,1143.5030537925036,235.96562500000002,1201.2844430340028,255.8C1259.065832275502,275.63437500000003,1374.6286107585008,288.25625,1432.41,299.075" stroke-width="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="45.0234375" cy="313.5" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="276.14899446599725" cy="306.2875" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="507.27455143199455" cy="219.7375" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="739.0333291020083" cy="303.4025" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="970.1588860680056" cy="140.4" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1201.2844430340028" cy="255.8" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="1432.41" cy="299.075" r="0" fill="#01c0c8" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 457.275px; top: 177px; display: none;"><div class="morris-hover-row-label">2012</div><div class="morris-hover-point" style="color: #fb9678">
                                Site A:
                                20
                                </div><div class="morris-hover-point" style="color: #7E81CB">
                                Site B:
                                50
                                </div><div class="morris-hover-point" style="color: #01C0C8">
                                Site C:
                                65
                                </div></div></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

@endsection
