@extends('layouts.master')
{{--@extends('layouts.app')--}}
@section('contenu')


    <div class="row p-4 pt-5">
    <h2>Bienvenu, {{userFullName()}}</h2>
      
    </div>   

        <div class="container">
             <div class="row justify-content-center">
            <h1><strong>Créez votre propre environnement virtuel "Web en 3D"</strong></h1>
            </div>
            <div class="row justify-content-center">
            <img src="images/AvatarsAccueil.png" class="image2">
            </div>
             <div class="row justify-content-center">
            <h2>Libre/Opensource, Décentralisé & Interconnecté</h2>
            </div>
        </div>
      
    

    {{--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté') }}
                </div>
            </div>
        </div>
    </div>--}}

@endsection
