@extends('layouts.frontOfficeLayout')

@section('content')
@include('component.topHeader')
@include('component.header')
@include('component.subHeaderOffre')



<br><br><br><br>

<section>

    <div class="container">
        <div class="row">

            <div class="col-3">
                <div class="accordion accordion-flush" id="accordionFlushExample" id="filter-results-container">
            
                    <form action="{{ route('filtrer') }}" method="GET">
                        <div id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed show" style="background-color: #e9ecef" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Domaine
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" >
                                <div class="accordion-body">
                                    @foreach ($domaines as $domaine )
                                    <label>
                                        <input type="checkbox" name="domaine[]" value="{{ $domaine->id }}"
                                        {{ in_array($domaine->id, $_GET['domaine'] ?? []) ? 'checked' : '' }}>
                                    {{ $domaine->libelle }}
                                    </label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed show" type="button" style="background-color: #e9ecef" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Niveaux d'études
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    @foreach ($niveaux as $niveau )
                                    <label>
                                        <input type="checkbox" name="niveau[]" value="{{ $niveau->id }}"
                                            {{ in_array($niveau->id, $_GET['niveau'] ?? []) ? 'checked' : '' }}>
                                        {{ $niveau->libelle }}
                                    </label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed show" type="button" style="background-color: #e9ecef; border:none" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                    Niveaux d'experience
                                </button>
                            </h2>
                            <div id="flush-collapse4" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <label>
                                        <input type="checkbox" name="experience[]" value="0"
                                            {{ in_array('0', $_GET['experience'] ?? []) ? 'checked' : '' }}> Moins de 1 an
                                    </label>
                                    <br>
                                    <label>
                                        <input type="checkbox" name="experience[]" value="1"
                                            {{ in_array('1', $_GET['experience'] ?? []) ? 'checked' : '' }}> 1 à 2 ans
                                    </label>
                                    <br>
                                    <label>
                                        <input type="checkbox" name="experience[]" value="3"
                                            {{ in_array('3', $_GET['experience'] ?? []) ? 'checked' : '' }}> 3 à 5 ans
                                    </label>
                                    <br>
                                    <label>
                                        <input type="checkbox" name="experience[]" value="6"
                                            {{ in_array('6', $_GET['experience'] ?? []) ? 'checked' : '' }}> 6 à 10 ans
                                    </label>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <br>

                        <button class="btn btn-primary"> Filtrer</button>
                    </form>
                    </div>


                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ $count }} Offre(s) d'emploi trouvée(s)
                    </div>
                        <br><br>
                    <table>
                            @if ($count == 0)
                                @include('component.nofoundMessage2')
                            @else
                            @foreach ($offres as $offre)
                            <tr>
                                <div class="row no-gutters">
                                   <div class="col-md-4">
                                    <a href="{{ asset('storage/' . $offre->pdfFile) }}" download="{{ $offre->pdfFile }}"><img height="75%" width="30%" src="{{ asset('images/pdf.png') }}" class="card-img" alt="..."></a>


                                   </div>
                                   <div class="col-md-8">
                                     <div class="card-body">
                                       <div class="row">
                                        <div class="col-9"><h5 class="card-title">{{ $offre -> libelle }}</h5></div>
                                       <div class="col" style="color: rgb(225, 147, 147)" style=""><span>{{ $offre->date_limite }}</span></div>
                                       </div>
                                       <p class="card-text" style="min-height: 100px">
                                        <?php
                                            $texteComplet = $offre->resume;
                                            $premiersMots = str_word_count($texteComplet, 1, '0123456789');
                                            $premiersMots = array_slice($premiersMots, 0, 40);
                                            echo implode(' ', $premiersMots);
                                        ?>
                                        </p>
                                       <div style="float: right">
                                           <a href="{{ route('postuler',$offre->id) }}" class="btn btn-primary" >Consulter</a>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                               </tr> <br><br>
                            @endforeach
                            @endif

                    </table>
                    <br><br>
                    {{-- <nav aria-label="Pagination" disabled>
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précedent</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="">Suivant</a></li>
                        </ul>
                    </nav> --}}

                </div>

                <br>
                <div class="d-flex justify-content-center">
                    {{ $offres->links() }}
                </div>
            </div>
        </div>
    </div>

</section>

<br><br><br>
    @include('component.footerHome')
@endsection
