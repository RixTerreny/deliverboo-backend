@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Benvenuto {{ Auth::user()->name }}
    
    </h2>
    
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"> <a class="text-decoration-none" href="{{route('dish.index')}}">I tuoi piatti</a></div>

                <div class="card-body">
                    <a href=""><button class="btn btn-primary">Aggiungi piatto</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-2 ">
        <div class="col">
            <div class="card">
                <div class="card-header"> <a class="text-decoration-none" href="#">Ordini ricevuti</a></div>

                <div class="card-body">
                    <a href=""><button class="btn btn-primary">Statistiche ordini</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
