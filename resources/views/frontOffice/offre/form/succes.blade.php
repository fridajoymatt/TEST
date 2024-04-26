@extends('layouts.frontOfficeLayout')
@include('component.header')
@include('component.subHeaderPostuler')

@section('content')


    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        .containerr {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 40%;

        }

        .icon {
            font-size: 48px;
            color: #4CAF50;
        }

        .message {
            font-size: 24px;
            margin-top: 20px;
            color: #333333;
        }

        .button-container {
            margin-top: 30px;
        }

        .back-button {
            padding: 10px 20px;
            background-color:#065998 ;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #065990;
        }
    </style>
    <div class="body">
        <div class="containerr">
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="message">
                @if ($candidature->sexe=='Masculin')
                Monsieur
            @else
                Madame
            @endif <span class="" style="">{{ $candidature->nom }} {{ $candidature->prenom }} </span>, votre candidature a été soumise avec succès !
            </div>
            <div class="button-container">
                <button class="back-button" onclick="window.location.href = '{{ route('home') }}'">Retour à l'accueil</button>
            </div>
        </div>
    </div>

@include('component.footerHome')

@endsection
